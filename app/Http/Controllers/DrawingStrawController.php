<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;

class DrawingStrawController extends Controller {
  /*
   * Show options page.
   */

  public function getOptions() {
    return view('options')->with('tables', Table::all());
  }

  /*
   * Set options.
   */

  public function setOptions(Request $request) {
    $numberOfTable = $request->get('reset');
    $leaderName = $request->get('table-leader');
    $tableId = $request->get('table');

    if (!empty($leaderName)) {
      $this->setLeader($tableId, $leaderName);
    }
    if (!empty($numberOfTable)) {
      $this->setTable($numberOfTable);
    }
    return view('options')->with('tables', Table::all());
  }

  /*
   * Drawing a new table for user.
   */

  public function drawing(Request $request) {
    $currentTableId = $request->get("origin-table");
    $newTableId = $this->getNextTable($currentTableId);

    if ($currentTableId != 0) {
      $currentTable = Table::find($currentTableId);
      $currentTable->number = $currentTable->number - 1;
      $currentTable->save();
    }

    $nextTable = Table::find($newTableId);
    $nextTable->number = $nextTable->number + 1;
    $nextTable->save();

    return view('straw')
                    ->with('tables', Table::all())
                    ->with('straw', $newTableId);
  }

  /*
   * Show straw page.
   */

  public function getStraw() {
    return view('straw')->with('tables', Table::all())->with('straw', 0);
  }

  /*
   * Set number of table, and reset tables.
   */

  private function setTable($number) {
    Table::truncate();
    for ($i = 0; $i < $number; $i++) {
      $table = new Table();
      $table->save();
    }
  }

  /*
   * Set name of table leader.
   */

  private function setLeader($tableId, $name) {
    $table = Table::find($tableId);
    $table->leader = $name;
    $table->save();
  }

  /*
   * Get new table id by rand.
   * @return int
   */

  private function getNextTable($index) {
    $probabilityOfTables = $this->getProbabilityOfTables();

    $rand = mt_rand(0, 10000 - 1) / 10000;
    $theStraw = 1;
    $step = 0;
    foreach ($probabilityOfTables as $key => $probability) {
      $step += $probability;
      if ($rand < $step) {
        $theStraw = $key;
        break;
      }
    }

    return $theStraw;
  }

  /*
   * Get probibility of tables.
   * @return array
   */

  private function getProbabilityOfTables($index) {
    $sumOfReciprocal = 0;
    $probabilityOfTables = [];

    $tables = Table::where('id', '<>', $index)->get();
    foreach ($tables as $table) {
      if ($table->number == 0) {
        return $table->id;
      }
    }

    foreach ($tables as $table) {
      $sumOfReciprocal += 1.0 / pow($table->number, 2);
    }

    foreach ($tables as $table) {
      $probabilityOfTables[$table->id] = 1.0 / pow($table->number, 2) / $sumOfReciprocal;
    }
    return $probabilityOfTables;
  }

}

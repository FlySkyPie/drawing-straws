<!DOCTYPE html>
<html>
  <head>
    <title>期中餐會抽籤程式</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body>
    <div class="container py-5">
      <div class="row">

      </div>
      <div class="row">
        <div class="col-6">
          <form action="" method="post">
            @csrf
            <div class="row py-3 border-bottom">
              <h3>step.1 請選擇原始桌號</h3>
              <div class="btn-group-vertical btn-block">
                <label class="btn btn-primary my-0">
                  <input type="radio" name="origin-table" value="0">我是新玩家
                </label>
                @foreach($tables as $table)
                <label class="btn btn-secondary my-0">
                  <input type="radio" name="origin-table" value="{{$table->id}}">第{{$table->id}}桌
                </label>
                @endforeach
              </div>
            </div>
            <div class="row py-3 border-bottom">
              <h3>step.2 按下抽籤鈕</h3>
              <button  class="btn btn-primary btn-lg btn-block" type="submit" value="submit">點此進行抽籤</button>
            </div>
            <div class="row py-3">
              <h3>step.3 以下是你的新桌號</h3>
            </div>
            @if($straw)
            <div class="alert alert-dismissible alert-warning">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h1 class="display-1 text-center">{{$straw}}</h1>
            </div>
            @endif
          </form>
        </div>
        <div class="col-6">
          @foreach($tables as $table)
          <div class="card mb-3">
            <h3 class="card-header">第{{$table->id}}桌</h3>
            <div class="card-body">
              <h5 class="card-title">桌長：{{$table->leader}}</h5>
              <h6 class="card-subtitle text-muted">人數：{{$table->number}}人</h6>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html> 
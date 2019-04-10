<!DOCTYPE html>
<html>
  <head>
    <title>期中餐會抽籤程式::設定</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body>
    <div class="container py-5">
      <div class="row border-bottom py-3 my-3">
        <form class="col" action="{{ url('options') }}" method="post">
          <div class="form-group row">
            <h3 class="col-sm-3">重新設定桌數</h3>
            <div class="col-sm-4">
              @csrf
              <input type="text" class="form-control" name="reset" >
            </div>
            <div class="col-sm-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <div class="row border-bottom">
        <div class="col">
          <h3>設定桌長</h3>
          <table class="table table-hover">
            <tbody>
              @foreach($tables as $table)
              <tr>
                <th scope="row">第{{$table->id}}桌</th>
                <td>
                  <form class="form-row" action="{{ url('options') }}" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                      <input type="hidden"  name="table" value="{{$table->id}}">
                      <input type="text" class="form-control" name="table-leader" value="{{$table->leader}}">
                    </div>
                    <div class="form-group col-md-2">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table> 
        </div>

      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    @csrf
    <form>

 <div class="custom-file">

         <label for="fname">holiday_name:</label>
         <input type="text" id="f1" name="Name" value="">
 </div><br>
 <div class="custom-file">
          <label for="lname" id ="f1">holiday_date:</label>
          <input type="text" name="Age">
 </div><br>
 <div class="custom-file">
    <label class="custom-file-label" for="chooseFile">image:</label>
    <input type="file" name="file" class="custom-file-input" id="chooseFile">
 </div>

 <div class="custom-file">
    <label for="lname" id ="f1">holiday_description:</label>
    <input type="text" name="Age">
 </div><br>


 <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">submit</button>
      </form>
  </div>
  @if(!empty($vmt_holidays_data))
  <h2>Form Saved successfully</h2>
  @endif
</body>
</html>


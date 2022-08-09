<script type="text/javascript">
    $(document).ready(function () {
          if (!$.browser.webkit) {
              $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
          }
      });
</script>
<style type="text/css">
    header
{
    font-family: 'Lobster', cursive;
    text-align: center;
    font-size: 25px;    
}


.scrollbar
{
    margin-left: 10px;
    float: left;
    height: 100px;
    width: 400px;
   
    overflow-y: scroll;
    margin-bottom: 25px;
}

.force-overflow
{
    min-height: 450px;
}

#wrapper
{
    text-align: center;
    width: 500px;
    margin: auto;
}

/*
 *  STYLE 1
 */

#style-1::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar-thumb
{
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}


</style>
<div class="card profile-box wrapper flex-fill card-top-border">
    <h4 class="m-0 title text-center text-primary card-title my-3 fw-bold">My Actions</h4>
    <hr class="m-0">
    <div class="card-body  scrollbar" id="style-4">

        <div  class="  ">
             @php
                                            $currentUser = Auth::user();
                                            $User = Auth::user()->unreadNotifications->count();
                                            foreach ($currentUser->unreadNotifications  as $notification) {
                                                // if($notification){
                                            @endphp

            <div class="mr-1     " style="font-size:10px">
                {{-- <b>6 July 2022</b> --}}
                <br>
                <span class="text-muted align-items-center py-1 px-3 bg-box-color-success">{{$notification->data['message']}}<b class="mx-1"></b><b class="ml-1"></b></span>
            </div>

 @php  } @endphp
 @php
                                             foreach ($currentUser->Notifications  as $not) {
                                            @endphp
                 <div class="mr-1  " style="font-size:10px">
                <br>
                <span class="text-muted py-1 px-3 bg-box-color-pink  align-items-center ">{{$not->data['message']}}
            </div>
            @php  } @endphp 
        </div>
    </div>
</div>
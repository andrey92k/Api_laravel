@include('layouts.default')
@include('layouts.menu')  

<section >
    <div class="container">
        <div class="row pt-md-3 py-md-3">
            <div class="col-sm-7">
                <h1>Setting Rank Tasks</h1>
            </div>
            
            <div class="col-sm-5">
                <button class="btn btn-success" id="update_tasks">UPDATE TASKS</button>
                <p id="message-update"></p>
            </div> 
        </div> 
    	<div class="row">
    		<div class="col-sm-12">
                <form action="#" method="POST" id="form">
                    @csrf
                <div class="form-row pt-md-3 py-md-3">
                    <div class="col">
                        <label>Search language</label>
                        <select id="lang" class="form-control" name="lang">

                            @foreach ($allLangues as $lang)
                            @if ($lang->se_language == 'English')
                            <option selected value="{{ $lang->se_language }}">{{ $lang->se_language }}</option>
                            @else
                            <option value="{{ $lang->se_language }}">{{ $lang->se_language }}</option>
                            @endif


                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label>Search engine </label>
                        <select  class="form-control" name="lang_name">

                            @foreach ($nameLangues as $name)               
                            <option value="{{ $name->se_name }}">{{ $name->se_name }}</option>

                            @endforeach

                        </select>
                    </div>    
                </div>
                <div class="form-row pt-md-3 py-md-3">
                    <div class="col">
                        <label>Search engine location:</label>    
                        <input type="text" class="form-control" id="searchFormLang" name='city' autocomplete="off">
                        
                        <ul class="list-group" id="searchHelperLang" style="display: none; position: absolute;"></ul>   
                    </div>
                    <div class="col">
                        <label>Search site:</label>
                        <input class="form-control" type="text" name="site">
                    </div>
                    <div class="col">
                        <label>Search keyword:</label>
                        <input class="form-control" type="text" name="key">
                    </div>      

                </div>
                <div class="form-group float-right">
                <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </form>
                
    		</div>	
    	</div>
        <div class="row">
            <p id="message"></p>
        </div>
    </div>
</section>





<script type="text/javascript">

    $('#lang').on('change', function() {
    var lang = $(this).val();

        $.ajax({
            url: "{{route('ajaxlang.getajaxlang')}}",
            method: 'POST',
            data: {
              _token: '{{csrf_token()}}', lang: lang
            }
        }).done(function (data) {

            var data = JSON.parse(data);

            $('select[name="lang_name"]').html('');
            $.each(data, function(i, j)   {
           
            $('select[name="lang_name"]').append('<option value="'+ j.se_name + '">'+ j.se_name + '</option>');
                
            });
        });
    });
</script>
<script type="text/javascript">
    $('#searchFormLang').keyup(function(){
        if($(this).val().length>3){

            var city = $(this).val();   
            $.ajax({
                url: "{{route('ajaxhelpcity.ajaxhelpcity')}}",
                method: 'POST',
                data: {
                  _token: '{{csrf_token()}}', city: city
                }
            }).done(function (data) {
                var data = JSON.parse(data);
                if(data.data.length!=undefined && data.data.length>0){
                    $('#searchHelperLang').html('');
                    $.each(data.data, function(i, j)   {
                    $('#searchHelperLang').append('<li  class="list-group-item">'+j.loc_name_canonical+'</li>');        

                    });
                $('#searchHelperLang').css('display', 'block');

                $('#searchHelperLang > li').on('click',function(){
                $('#searchFormLang').val($(this).text());
                $('#searchHelperLang').css('display', 'none');
                });  

                }else{
                    $('#searchHelperLang').css('display', 'none');
                }
            });

        }else{
            $('#searchHelperLang').css('display', 'none');
        }
  });
</script>
<script type="text/javascript">
$(function() {
      $('form').submit(function(e) {
        e.preventDefault();    
        var form = $(this);
        $.ajax({
          url: "{{route('setting.run')}}",
          method: 'POST',
          data: form.serialize()
        }).done(function(data) {

            var data = JSON.parse(data);
            if(data.status == 'error'){
                $.each(data.error, function(i, j)   {
                $('#message').html('');    
                $('#message').append(j.code + ' ' +j.message);               
                });
            }
            if(data.status == 'ok'){
                $.each(data.results, function(i, j)   {
                $('#message').html('');     
                $('#message').append('Task successfully added ' + 'task_id' + ': ' + j.task_id);
                $('input[name="city"]').val('');
                $('input[name="site"]').val('');
                $('input[name="key"]').val('');
                });
            }
          
            
        });
       
      });
});
</script>
<script type="text/javascript">
    $( "#update_tasks" ).click(function() {
        $.ajax({
          url: "{{route('ajaxupdatetasks.ajaxupdatetasks')}}",
          method: 'POST',
          data: {
            _token: '{{csrf_token()}}'
          }
        }).done(function(data) { 
            if(data > 0){
                $('#message-update').html('');     
                $('#message-update').append(data + ' successfully updated');
            }else{
                $('#message-update').html('');     
                $('#message-update').append('nothing to update');
            }     
        });
    });

</script>

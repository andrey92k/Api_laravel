@include('layouts.default')
@include('layouts.menu')  
   
<section >
    <div class="container">
        <div class="row pt-md-3 py-md-3">
            <div class="col-sm-7">
                <h1>All Rank Tasks</h1>
            </div>
            
            <div class="col-sm-5">
                <button class="btn btn-success" id="update_tasks">UPDATE TASKS</button>
                <p id="message"></p>
            </div> 
        </div> 
        <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th scope="col">Task ID</th>
                    <th scope="col">Post Site</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    
                    <td>{{ $task->task_id }}</td>
                    <td>{{ $task->post_site }}</td>

                    <td>
                    <a class="btn btn-primary" href="{{route('get-tasks.show', $task->id)}}">view</a>
                    <form style=" display: inline;" action="{{route('get-tasks.destroy', $task->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger">remove</button>
                        
                    </form>
                    </td>              
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>    
</section>


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
                $('#message').html('');     
                $('#message').append(data + ' successfully updated');
            }else{
                $('#message').html('');     
                $('#message').append('nothing to update');
            }     
        });
    });

</script>

@include('layouts.default')
@include('layouts.menu')  
<section >
    <div class="container">
        <div class="row pt-md-3 py-md-3">
            <div class="col-sm-12">
                 <h1>Task #{{$task->task_id}}</h1> 
            </div>
        </div> 
       
        <div class="row"> 
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 150px;">Field name</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Task ID</td>
                    <td>{{$task->task_id}}</td>
                </tr>
                 <tr>
                    <td>Post Site</td>
                    <td>{{$task->post_site}}</td>
                </tr>
                <tr>
                    <td>Result Datetime</td>
                    <td>{{$task->result_datetime}}</td>
                </tr>
                <tr>
                    <td>Result Position</td>
                    <td>{{$task->result_position}}</td>
                </tr>
                <tr>
                    <td>Result URL</td>
                    <td>{{$task->result_url}}</td>
                </tr>
                <tr>
                    <td>Result Title</td>
                    <td>{{$task->result_title}}</td>
                </tr>
                <tr>
                    <td>Result Snippet Extra</td>
                    <td>{{$task->result_snippet_extra}}</td>
                </tr>
                <tr>
                    <td>Result Snippet</td>
                    <td>{{$task->result_snippet}}</td>
                </tr>
                <tr>
                    <td>Result Count</td>
                    <td>{{$task->results_count}}</td>
                </tr>
                <tr>
                    <td>Result Extra</td>
                    <td>{{$task->result_extra}}</td>
                </tr>
                <tr>
                    <td>Result Spell</td>
                    <td>{{$task->result_spell}}</td>
                </tr>
                <tr>
                    <td>Result Spell Type</td>
                    <td>{{$task->result_spell_type}}</td>
                </tr>
                <tr>
                    <td>Result Check Url</td>
                    <td>{{$task->result_se_check_url}}</td>
                </tr>
            </tbody>
        </table>
        </div>

    </div>
</section>

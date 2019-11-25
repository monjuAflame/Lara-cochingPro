<div class="modal fade" id="choise-course" role="dialog" >
	<div class="modal-dialog modal-xs">
		<section class="panel panel-dafult">
    		<header class="panel-heading" style="border-top: 1px solid #ccc;">
    			Filter Course
    		</header>
    		
              

    			<form action="#" class="form-horizontal" id="form-update-course" method="POST">
                  <input type="hidden" name="active" id="active" value="1">
                  <input type="hidden" name="class_id" id="class_id" >
                 <div class="panel-body">

                    <div class="form-group">
                        {{---------------------}}
                        <div class="col-md-6">
                            <label for="program">Class</label>
                            <div class="input-group">
                                <select name="program_id" id="program_id" class="form-control">
                                    <option value="">---------</option>
                                    @foreach( $programs as $program)
                                        <option value="{{ $program->program_id }}">{{ $program->program }}</option>
                                    @endforeach
                                
                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-class"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}
                        
                        <div class="col-md-6">
                            <label for="level">Batch</label>
                            <div class="input-group">
                                <select name="batch_id" id="batch_id" class="form-control">
                                    <option value="">---------</option>
                                    
                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-batch"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}

                        <div class="col-md-6">
                            <label for="shift">Shift</label>
                            <div class="input-group">
                                <select name="shift_id" id="shift_id" class="form-control">
                                    
                                    <option value="">---------</option>
                                    @foreach( $shifts as $shift)
                                        <option value="{{$shift->shift_id}}">{{$shift->shift}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-shift"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}

                        <div class="col-md-6">
                            <label for="group">Group</label>
                            <div class="input-group">
                                <select name="group_id" id="group_id" class="form-control">
                                    
                                    <option value="">---------</option>
                                    @foreach( $groups as $group)
                                        <option value="{{$group->group_id}}">{{$group->group}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-addon">
                                    <span class="fa fa-plus" id="add-more-group"></span>
                                </div>
                            </div>
                        </div>
                        {{---------------------}}
                        
                        
                

                    </div>
                </div>
                </form>
    		{{----------------------}}
            <div class="panel panel-defult">
                <div class="panel-heading">Choise Course</div>
                <div class="panel-body" id="show-class-info" style="overflow-y: auto; height: 250px;">
                    
                       
                            
                
                </div>
            </div>
            {{----------------------}}
        </section>

	</div>
</div>
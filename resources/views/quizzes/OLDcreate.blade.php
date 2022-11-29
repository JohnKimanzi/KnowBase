<html lang="en">  
<head>  
  <title> Example of Add More Field using the Bootstrap and Jquery </title>  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
</head>  
<body>  
  
<div class="container">  
    <div class="panel panel-default">  
        <div class="panel-heading"> Add More Field using the Bootstrap and Jquery </div>  
            <div class="panel-body">  
        
                <form id="new_quiz" method="POST" action="{{ route('quizzes.store') }}" >  
                    @csrf
                    <div class=" after-add-more">  
                        <div class="input-group-btn">   
                            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add option</button>  
                        </div>  
                        <div class="removable " style="margin:10px">  
                            <div class="row">
                                <div class="col-md-4">
                                    <textarea id="choices"  class="form-control @error('choices') is-invalid @enderror" name="choices[]" value="{{ old('choices[]') }}" autocomplete="choices" autofocus></textarea>
                                </div>
                                <div class="col-md-1">
                                    <input id="correct" type="radio" value="wrong" class="form-control @error('correct') is-invalid @enderror" name="correct" required autofocus>
                                </div>
                                    
                            </div>
                            @error('choices')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>  
                            
                    </div>  
                    
                        <input type='text' hidden name='ans' id='ans' value="">
                     
                    <button id="save-btn" class="btn btn-primary" role="submit">Save</button>
        
                </form>
        
                    <!-- Copy Fields -->  
                    <div class="copy hide">  
                        <div class="removable " style="margin:10px">  
                            <div class="row">
                                <div class="col-md-4">
                                    <textarea id="choices"  class="form-control @error('choices') is-invalid @enderror" name="choices[]" value="{{ old('choices') }}" autocomplete="choices" autofocus></textarea>
                                </div>
                                <div class="col-md-1">
                                    <input id="correct" type="radio" value="very wrong" class="form-control @error('correct') is-invalid @enderror" name="correct" required autofocus>
                                </div>
                                <div class="input-group-btn">   
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>  
                                </div> 
                            </div>
                            @error('choices')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                          
                        </div>  
                    </div>
                    <!-- Copy Fields -->  
                  
            </div>
        
        </div>  
    </div>  
</div>  
  
<script type="text/javascript">  
    //   This one allows to add fields for options on-demand
    $(document).ready(function() 
    {  
      $(".add-more").click(function(){   
          var html = $(".copy").html();  
          $(".after-add-more").after(html);  
      });  
  
      $("body").on("click",".remove",function(){   
          $(this).parents(".removable").remove();  
      });  
    });  

    //I am unable to obtain the selected radio(since am using same #id). this should obtain and return the selecte index manually usinfg hidden textfield
    jQuery(function($) {
        $('#new_quiz').submit(function() {
            var ans = $('#ans');
            var choices=$('#choices');
            var radioButtons = $("#new_quiz input:radio[name='correct']");
                // this should get the index of the found radio button based on the list of all
            var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));
            ans.val(selectedIndex);
        });
    });
</script>  
  
</body>  
</html>  
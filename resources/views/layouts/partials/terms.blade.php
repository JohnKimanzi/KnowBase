{{-- confirm modal --}}
<div class="modal custom-modal fade" id="start_test" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <ul class="personal-info">
                        <li> 
                            <div class="text"><h3>Tearms and conditions </h3></div>
                            <div>
                                <span>
                                    You will be required to turn on your camera so that the examiner can be able to monitor your surroundings.
                                    
                                    <br> Please check out the terms and conditions form the policies section.
                                    <br>By choosing to continue, you agree to the Techno Brain Aptitude test terms and regulations.
                                </span>
                            </div>
                        </li>
                    </ul>
                <div class="modal-btn delete-action">
                    <form action="{{route('startassessment', $lesson)}}" method="get">
                        <div class="row">
                            <div class="col-12">
                                <input type="checkbox" name="agree" id="agree" required >
                                <label for="agree">I accept to the terms and conditions</label>
                            </div>
                            
                            <div class="col-6">
                                <button class="btn btn-primary continue-btn">Continue</button>
                            </div>
                            <div class="col-6">
                                <a href="" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- confirm modal --}}
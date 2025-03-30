<div class="modal fade" id="ReportfilterModal" tabindex="-1" aria-labelledby="ReportfilterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ReportfilterModalLabel">Filter Records</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="reservation-report.php" method="POST">
                    
                    <div class="col-md-12 mb-4">
                        <label class="small mb-1" for="month">Select Month: </label>
                        <select id="month" class="form-select" aria-label="Default select example" name="month">
                            <option value="" disabled selected>Please select option</option>
                                <optgroup label="Month">
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </optgroup>
                        </select>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="small mb-1" for="years">Select Year:</label>
                        <select id="ddlyears" class="form-select" aria-label="Default select example" name="year">
                            <option value="" disabled selected>Please select option</option>
                            <optgroup label="Year"></optgroup>
                        </select>
                    </div>


                    <div class="modal-footer">
                         <button name="submit" type="submit" class="btn btn-primary">
                           Confirm
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

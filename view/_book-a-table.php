<?php

echo'
    <div class="row book-a-table">
            <form id="bookTable" method="post" action="../controller/reservation.php" class="col-lg-4 col-lg-offset-4 col-md-offset-3 col-md-6 col-sm-offset-2
                                            col-sm-8 col-xs-offset-1 col-xs-10 animated fadeIn">
                <h3 class="center-block">BOOK A TABLE </h3>
                <h4>NUMBER OF PEOPLE</h4>
                <select id="numberOfPeople" name="people" class="form-control" required>
                    <option value="1">1 Person</option>
                    <option value="2">2 Persons</option>
                    <option value="3">3 Persons</option>
                    <option value="4">4 Persons</option>
                    <option value="5">5 Persons</option>
                    <option value="6">6 Persons</option>
                    <option value="7">7 Persons</option>
                    <option value="8">8 Persons</option>
                    <option value="9">9 Persons</option>
                    <option value="10">10 Persons</option>
                    <option value="11">11 Persons</option>
                    <option value="12">12 Persons</option>
                </select>
                <div class="pull-left" style="width:47%">
                    <h4>Date</h4>
                    <input id="date" type="text" name="date" class="form-control" placeholder="mm/dd/yyyy" >
                </div>
                <div class="pull-right" style="width:47%">
                    <h4>Time</h4>
                    <select id="time" name="time" class="form-control" required >
                        <option value="Dinner">Dinner</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Breakfast">Breakfast</option>
                    </select>
                </div>
                <!--- BookNow button-->
                <button id="btnBookNow" class="btn center-block hvr-bounce-to-right ">
                    <span class="hvr-pulse-grow">BOOK NOW</span><i class="fa fa-angle-right animated slideInRight"></i>
                </button>
            </form>
    </div>
    ';
?>
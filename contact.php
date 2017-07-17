<!DOCTYPE html>
<html>
<head>
    <?php include 'topper.php';?>
    <title>Contact</title>
</head>

<body>
<?php include 'header.php';?>
        <main>
            <div id="title"> </div>
            <div id="formarea">
                <h2>Need a Comedian?</h2>
                <p>Fill out the form below to make a booking enquiry.</p>
                <form id="cInfo" action="/~e54061/wp/processing.php" method="post">
                    <div class="inputformat">
                        <label for="firstName">First Name*</label>
                        <input class="input" type="text" id="firstName" name="First Name" placeholder="Josh" size="60" maxlength="128"
                               pattern="[A-Z][a-z' ]{2,62}[a-z]" required> </div>
                    </br>
                    <div class="inputformat">
                        <label for="lastName">Last Name*</label>
                        <input class="input" type="text" id="lastName" name="Last Name" placeholder="Thomas" size="60" maxlength="128"
                               pattern="[A-Za-z- ']{2,62}[a-z.]" required> </div>
                    </br>
                    <div class="inputformat">
                        <label for="emailAddress">Email Address*</label>
                        <input class="input" type="email" id="emailAddress" name="Email Address" placeholder="abc1@gmail.com" size="60" maxlength="128" required> </div>
                    </br>
                    <div class="inputformat">
                        <label for="phoneNumber">Phone Number*</label>
                        <input class="input" type="tel" id="phoneNumber" name="Phone Number" placeholder="+61 12345678"
                               pattern="[\+]?[0-9][0-9-]{0,4}[- ]?(\(\d{3,4}\)|\d{3,4})[- ]?\d{3,4}[- ]?\d{0,4}" size="60" required> </div>
                    </br>
                    <div class="inputformat">
                        <label for="eventDate">Event Date*</label>
                        <input class="input" type="date" id="eventDate" name="Event Date" placeholder="dd/mm/yyyy" required> </div>
                    <div class="inputformat">
                        <label for="flexibility" id="flex">Flexibility (Low to High)</label>
                        <input class="input" type="range" id="flexibility" name="flexibility" min=0 max=20 step=10> </div>
                    </br>
                    <div class="inputformat">
                        <label for="eventTime">Event Time</label>
                        <input class="input" type="time" id="eventTime" name="Event Time"> </div>
                    </br>
                    <div class="inputformat">
                        <label for="eventLocation">Event Location</label>
                        <textarea class="input" id="eventLocation" name="Event Location" placeholder="Melbourne Victory Australia"
                                  onblur="if(/[^0-9a-zA-Z ,.-]/g.test(value))alert('Please match the format')" cols="60" rows="3"></textarea>
                    </div>
                    </br>
                    <div class="inputformat" id="event">
                        <label for="eventDescription">Event Description</label>
                        <textarea class="input" id="eventDescription" name="Event Description" placeholder="It is a celebration for ..."
                                  onblur="if(/[^0-9a-zA-Z ',.-]/g.test(value))alert('Please match the format')" cols="60" rows="5"></textarea>
                    </div>
                    </br>
                    <div class="inputformat">
                        <label>Performance Required</label>
                        <select name="performanceRequired">
                            <option value selected="selected">- None -</option>
                            <option value="mc">MC</option>
                            <option value="comedy_spot">Comedy Spot</option>
                            <option value="full_show">Full Show</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    </br>
                    <input id="submit" type="submit" value="Submit" name="op"> </form>
            </div>
        </main>
    </div>
<?php include 'footer.php';?>
    </body>

    </html>

        //on page load do the following
        $(document).ready(function () {
            //get the program type element
            var program_type_element = document.getElementById("profile_programtype");
            //get the program type value
            var program_type = program_type_element.options[program_type_element.selectedIndex].value;
            //initialize the ajax call
            $.ajax({
                type: "POST",
                url: Routing.generate('profilepage'),
                contentType: 'application/x-www-form-urlencoded',
                //send the program_type_id and flag to the server
                data: {program_type_id: program_type, flag: 'load_type'},
                //on successfull ajax call do the following
                success: function (result, status, xhr) {
                    //parse the result and save it in pi_arr
                    var pi_arr = JSON.parse(result);
                    //remove all the options from the programofinterest select element
                    $("#profile_programofinterest").empty()
                    //loop through the array pi_arr['pi'] one by one
                    for (var i in pi_arr['pi']) {
                        //check if pi_arr['pi']'s key is piselected
                        if (i === 'piselected') {
                            //get the value of pi_arr['pi']['piselected'](ie. selected program of interest) and save it in program_of_interest
                            program_of_interest = pi_arr['pi'][i];
                        } else {
                            //else add the option with value i and text pi_arr['pi'][i]
                            $("#profile_programofinterest").append($("<option/>", {"value": i, "text": pi_arr['pi'][i]}));
                        }
                    }
                    //set the value for selected program of interest
                    $("#profile_programofinterest").val(program_of_interest);
                    //remove all the options from the desiredintake select element
                    $("#profile_desiredintake").empty();
                    //loop through array pi_arr['di'] one by one
                    for (var i in pi_arr['di']) {
                        //check if pi_arr['di']'s key is diselected
                        if (i === 'diselected') {
                            //get the value of pi_arr['di']['diselected'](ie. selected desired intake) and save it in desired_intake
                            desired_intake = pi_arr['di'][i];
                        } else {
                            //else add the option with value i and text pi_arr['di'][i]
                            $("#profile_desiredintake").append($("<option/>", {"value": i, "text": pi_arr['di'][i]}));
                        }
                    }
                    //set the value for selected desired intake
                    $("#profile_desiredintake").val(desired_intake);
                    //remove all the options from the intakeyear select element
                    $("#profile_intakeyear").empty();
                    var intake_year = pi_arr['iy'];
                    $("#profile_intakeyear").append($("<option/>", {"value": pi_arr['iy'], "text": pi_arr['iy']}));

                    //set the value for selected desired intake
                    $("#profile_intakeyear").val(intake_year);
                },
                //on unsuccessfull ajax call do the following
                error: function (xhr, status, error) {

                }
            });
            //when the program type value changes do the following
            $("#profile_programtype").change(function () {
                //get the program type element
                var program_type_element = document.getElementById("profile_programtype");
                //get the program type value
                var program_type = program_type_element.options[program_type_element.selectedIndex].value;
                //initiate the ajax call
                $.ajax({
                    type: "POST",
                    url: Routing.generate('profilepage'),
                    contentType: 'application/x-www-form-urlencoded',
                    //send the program_type_id and flag to the server
                    data: {program_type_id: program_type, flag: 'program_type'},
                    //on successfull ajax call do the following
                    success: function (result, status, xhr) {
                        //parse the result and save it in pi_arr
                        var pi_arr = JSON.parse(result);
                        //remove all the options from the programofinterest select element
                        $("#profile_programofinterest").empty()
                        //loop through the array pi_arr['pi'] one by one
                        for (var i in pi_arr['pi']) {
                            //add the option with value i and text pi_arr['pi'][i]
                            $("#profile_programofinterest").append($("<option/>", {"value": i, "text": pi_arr['pi'][i]}));
                        }
                        //remove all the options from the desiredintake select element
                        $("#profile_desiredintake").empty();
                        //loop through array pi_arr['di'] one by one
                        for (var i in pi_arr['di']) {
                            //add the option with value i and text pi_arr['di'][i]
                            $("#profile_desiredintake").append($("<option/>", {"value": i, "text": pi_arr['di'][i]}));
                        }
                    },
                    //on unsuccessfull ajax call do the following
                    error: function (xhr, status, error) {

                    }
                });
            });
            //when the program of interest value changes do the following
            $("#profile_programofinterest").change(function () {
                //get the program of interest element
                var program_of_interest_element = document.getElementById("profile_programofinterest");
                //get the program of interest value
                var program_of_interest = program_of_interest_element.options[program_of_interest_element.selectedIndex].value;
                //initiate the ajax call
                $.ajax({
                    type: "POST",
                    url: Routing.generate('profilepage'),
                    contentType: 'application/x-www-form-urlencoded',
                    //send the program_of_interest_id and flag to the server
                    data: {program_of_interest_id: program_of_interest, flag: 'program_of_interest'},
                    //on successfull ajax call do the following
                    success: function (result, status, xhr) {
                        //parse the result and save it in di_arr
                        var di_arr = JSON.parse(result);
                        //remove all the options from the desiredintake select element
                        $("#profile_desiredintake").empty();
                        //loop through array di_arr one by one
                        for (var i in di_arr) {
                            //add the option with value i and text di_arr[i]
                            $("#profile_desiredintake").append($("<option/>", {"value": i, "text": di_arr[i]}));
                        }
                    },
                    //on unsuccessfull ajax call do the following
                    error: function (xhr, status, error) {

                    }
                });
            });
            //when the desired intake value changes do the following
            $("#profile_desiredintake").change(function () {
                //get the program type element
                var program_type_element = document.getElementById("profile_programtype");
                //get the program type value
                var program_type = program_type_element.options[program_type_element.selectedIndex].value;
                //get the program of interest element
                var program_of_interest_element = document.getElementById("profile_programofinterest");
                //get the program of interest value
                var program_of_interest = program_of_interest_element.options[program_of_interest_element.selectedIndex].value;
                //get the program of interest element
                var desired_intake_element = document.getElementById("profile_desiredintake");
                //get the program of interest value
                var desired_intake = desired_intake_element.options[desired_intake_element.selectedIndex].value;
                //initiate the ajax call
                $.ajax({
                    type: "POST",
                    url: Routing.generate('profilepage'),
                    contentType: 'application/x-www-form-urlencoded',
                    //send the program_of_interest_id and flag to the server
                    data: {desired_intake_id: desired_intake, program_type_id: program_type, program_of_interest_id: program_of_interest, flag: 'desired_intake'},
                    //on successfull ajax call do the following
                    success: function (result, status, xhr) {
                        //parse the result and save it in intake_year
                        var intake_year = JSON.parse(result);
                        //remove all the options from the intakeyear select element   
                        $("#profile_intakeyear").empty();
                        $("#profile_intakeyear").append($("<option/>", {"value": intake_year, "text": intake_year}));

                        $("#profile_intakeyear").val(intake_year);
                    },
                    //on unsuccessfull ajax call do the following
                    error: function (xhr, status, error) {

                    }
                });
            });
        });
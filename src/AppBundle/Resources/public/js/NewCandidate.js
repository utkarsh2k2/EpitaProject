//on page load do the following
        $(document).ready(function () {
                //when the program type value changes do the following
                $("#candidate_programtype").change(function () {
                    //get the program type element
                    var program_type_element = document.getElementById("candidate_programtype");
                    //get the program type value
                    var program_type = program_type_element.options[program_type_element.selectedIndex].value;
                    //initiate the ajax call
                    $.ajax({
                        type: "POST",
                        url: Routing.generate('homepage'),
                        contentType: 'application/x-www-form-urlencoded',
                        //send the program_type_id and flag to the server
                        data: {program_type_id: program_type, flag: 'program_type'},
                        //on successfull ajax call do the following
                        success: function (result, status, xhr) {
                            //parse the result and save it in pi_arr
                            var pi_arr = JSON.parse(result);
                            //remove all the options from the programofinterest select element
                            $("#candidate_programofinterest").empty();
                        //loop through the array pi_arr['pi'] one by one    
                        for (var i in pi_arr['pi']) {
                                //add the option with value i and text pi_arr['pi'][i]
                                $("#candidate_programofinterest").append($("<option/>", {"value": i, "text": pi_arr['pi'][i]}));
                            }
                            //remove all the options from the desiredintake select element
                            $("#candidate_desiredintake").empty();
                            //loop through array pi_arr['di'] one by one
                            for (var i in pi_arr['di']) {
                                //add the option with value i and text pi_arr['di'][i]
                                $("#candidate_desiredintake").append($("<option/>", {"value": i, "text": pi_arr['di'][i]}));
                            }
                        },
                        //on unsuccessfull ajax call do the following
                        error: function (xhr, status, error) {
                            
                        }
                    });
                });
                //when the program of interest value changes do the following
                $("#candidate_programofinterest").change(function () {
                    //get the program of interest element
                    var program_of_interest_element = document.getElementById("candidate_programofinterest");
                    //get the program of interest value
                    var program_of_interest = program_of_interest_element.options[program_of_interest_element.selectedIndex].value;
                    //initiate the ajax call
                    $.ajax({
                        type: "POST",
                        url: Routing.generate('homepage'),
                        contentType: 'application/x-www-form-urlencoded',
                        //send the program_of_interest_id and flag to the server
                        data: {program_of_interest_id: program_of_interest, flag: 'program_of_interest'},
                        //on successfull ajax call do the following
                        success: function (result, status, xhr) {
                            //parse the result and save it in di_arr
                            var di_arr = JSON.parse(result);
                            //remove all the options from the desiredintake select element
                            $("#candidate_desiredintake").empty();
                            //loop through array di_arr one by one
                            for (var i in di_arr) {
                                //add the option with value i and text di_arr[i]
                                $("#candidate_desiredintake").append($("<option/>", {"value": i, "text": di_arr[i]}));
                            }
                        },
                        //on unsuccessfull ajax call do the following
                        error: function (xhr, status, error) {
                            
                        }
                    });
                });
                //when the desired intake value changes do the following
                $("#candidate_desiredintake").change(function () {
                    //get the program type element
                    var program_type_element = document.getElementById("candidate_programtype");
                    //get the program type value
                    var program_type = program_type_element.options[program_type_element.selectedIndex].value;
                    
                    //get the program of interest element
                    var program_of_interest_element = document.getElementById("candidate_programofinterest");
                    //get the program of interest value
                    var program_of_interest = program_of_interest_element.options[program_of_interest_element.selectedIndex].value;
                    
                    //get the desired intake element
                    var desired_intake_element = document.getElementById("candidate_desiredintake");
                    //get the desired intake value
                    var desired_intake = desired_intake_element.options[desired_intake_element.selectedIndex].value;
                    //initiate the ajax call

                    $.ajax({
                        type: "POST",
                        url: Routing.generate('homepage'),
                        contentType: 'application/x-www-form-urlencoded',
                        //send the program_of_interest_id and flag to the server
                        data: {program_type_id: program_type, program_of_interest_id: program_of_interest, desired_intake_id: desired_intake, flag: 'desired_intake'},
                        //on successfull ajax call do the following
                        success: function (result, status, xhr) {
                            //parse the result and save it in intakeyear
                            var intakeyear = JSON.parse(result);
                            //remove all the options from the intakeyear select element
                            $("#candidate_intakeyear").empty();
                            $("#candidate_intakeyear").append($("<option/>", {"value": intakeyear, "text": intakeyear}));
                        },
                        //on unsuccessfull ajax call do the following
                        error: function (xhr, status, error) {
                            
                        }
                    });
                });
            });
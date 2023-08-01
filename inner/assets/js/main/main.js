  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tabs");
    for (var i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    x[n].style.display = "block";

    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
      document.getElementById("btn__prev__arrow").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }

    if (n == x.length - 1) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }

    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n);
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tabs");

    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm(currentTab)) return false;

    // Hide the current tab:
    x[currentTab].style.display = "none";

    // Increase or decrease the current tab by 1:
    currentTab += n;

    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }

    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm(n) {
    // This function deals with validation of the form fields for a specific tab
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tabs");
    y = x[n].getElementsByTagName("input");

    // Clear previous warning message
    document.getElementById("warning-message").innerText = "";

    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value.trim() == "") {
        // add an "invalid" class to the field:
        y[i].classList.add("invalid");
        // and set the current valid status to false
        valid = false;

        // Show warning message for the empty field:
        var warningMessage = "Please fill in all fields.";
        document.getElementById("warning-message").innerText = warningMessage;
      } else {
        y[i].classList.remove("invalid");
      }
    }

    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[n].className = "step finish";
    }

    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace("active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }

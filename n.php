<!-- Calendly link widget begin -->
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>

<!-- Dropdown to select a doctor -->
<select id="doctorSelect">
    <option value="">Select a Doctor</option>
    <option value="3">Dr. John Doe</option>
    <option value="2">Dr. Jane Smith</option>
    <option value="1">Dr. Lawry Ochieng</option>
</select>

<!-- Calendly widget link that opens the popup -->


<a href="#" id="calendlyLink" style="display: none; text-decoration:none; background-color:blue; color:white; padding:10px; border-radius:8px; text-align:center; height:50px; font-weight:bold;" onclick="openCalendlyWidget(); return false;">Select An Appointment Time</a>
<!-- Calendly link widget end -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
// This function will open the Calendly widget with the selected doctor's link
function openCalendlyWidget() {
                var DoctorID = $('#doctorSelect').val();  

                if (DoctorID) {
                    $.ajax({
                        url: 'get_calendly_link.php',
                        type: 'POST',
                        data: { DoctorID: DoctorID },
                        success: function(response) {
                            Calendly.initPopupWidget({ url: response });
                        },
                        error: function() {
                            alert('Error fetching Calendly link');
                        }
                    });
                } else {
                    alert('Please select a doctor.');
                }
            }

$(document).ready(function() {
    // Ensure the Calendly link is updated when a doctor is selected
    $('#doctorSelect').change(function() {
        var DoctorID = $(this).val();

        // Only update the link if a valid doctor is selected
        if (DoctorID) {
            $.ajax({
                url: 'get_calendly_link.php',
                type: 'POST',
                data: { DoctorID: DoctorID },
                success: function(response) {
                    // Update the href link to reflect the selected doctor's Calendly link
                    $('#calendlyLink').attr('href', response);
                },
                error: function() {
                    alert('Error fetching Calendly link');
                }
            });
        }
    });
});
</script>

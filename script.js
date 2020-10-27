// Initialize and add the map
function initMap() {
    // The location of Saykal
    var saykal = {lat: 41.938290, lng: -87.800070};
    // The map, centered at Saykal
    var map = new google.maps.Map(
        document.getElementById('map'), 
        {zoom: 16, 
         center: saykal,
         scrollwheel: false
        });
    // The marker, positioned at Saykal
    var marker = new google.maps.Marker({position: saykal, map: map});
}

function validateForm() {
    if (isEmpty(document.getElementById('data_3').value.trim())) {
        alert('Name is required!');
        return false;
    }
    if (!validateEmail(document.getElementById('data_5').value.trim())) {
        alert('Email must be a valid email address!');
        return false;
    }
    if (isEmpty(document.getElementById('data_6').value.trim())) {
        alert('Date is required!');
        return false;
    }
    if (isEmpty(document.getElementById('data_7').value.trim())) {
        alert('Time is required!');
        return false;
    }
    return true;
}
function isEmpty(str) { return (str.length === 0 || !str.trim()); }
function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,15}(?:\.[a-z]{2})?)$/i;
    return isEmpty(email) || re.test(email);
}
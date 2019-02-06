function setDisrict(divisionId) {
    $('#personaldistrict > option').children().remove();
    $('#personaldistrict').append("<option value='0' selected>Select District</option>");



    if (divisionId === 1) {
        $('#personaldistrict').append("<option data-division='1' value='34'>Barguna</option>");
        $('#personaldistrict').append("<option data-division='1' value='35'>Barishal</option>");
        $('#personaldistrict').append("<option data-division='1' value='36'>Bhola</option>");
        $('#personaldistrict').append("<option data-division='1' value='37'>Jhalokati</option>");
        $('#personaldistrict').append("<option data-division='1' value='38'>Patuakhali</option>");
        $('#personaldistrict').append("<option data-division='1' value='39'>Pirojpur</option>");
    }

    if (divisionId === 2) {
        $('#personaldistrict').append("<option data-division='2' value='40'>Bandarban</option>");
        $('#personaldistrict').append("<option data-division='2' value='41'>Brahmanbaria</option>");
        $('#personaldistrict').append("<option data-division='2' value='42'>Chandpur</option>");
        $('#personaldistrict').append("<option data-division='2' value='43'>Chattogram</option>");
        $('#personaldistrict').append("<option data-division='2' value='45'>Cox&#039;s Bazar</option>");
        $('#personaldistrict').append("<option data-division='2' value='44'>Cumilla</option>");
        $('#personaldistrict').append("<option data-division='2' value='46'>Feni</option>");
        $('#personaldistrict').append("<option data-division='2' value='47'>Khagrachari</option>");
        $('#personaldistrict').append("<option data-division='2' value='48'>Lakshmipur</option>");
        $('#personaldistrict').append("<option data-division='2' value='49'>Noakhali</option>");
        $('#personaldistrict').append("<option data-division='2' value='50'>Rangamati</option>");
    }

    if (divisionId === 3) {
        $('#personaldistrict').append("<option data-division='3' value='1'>Dhaka</option>");
        $('#personaldistrict').append("<option data-division='3' value='2'>Faridpur</option>");
        $('#personaldistrict').append("<option data-division='3' value='3'>Gazipur</option>");
        $('#personaldistrict').append("<option data-division='3' value='4'>Gopalganj</option>");
        $('#personaldistrict').append("<option data-division='3' value='6'>Kishoreganj</option>");
        $('#personaldistrict').append("<option data-division='3' value='7'>Madaripur</option>");
        $('#personaldistrict').append("<option data-division='3' value='8'>Manikganj</option>");
        $('#personaldistrict').append("<option data-division='3' value='9'>Munshiganj</option>");
        $('#personaldistrict').append("<option data-division='3' value='11'>Narayanganj</option>");
        $('#personaldistrict').append("<option data-division='3' value='12'>Narsingdi</option>");
        $('#personaldistrict').append("<option data-division='3' value='14'>Rajbari</option>");
        $('#personaldistrict').append("<option data-division='3' value='15'>Shariatpur</option>");
        $('#personaldistrict').append("<option data-division='3' value='17'>Tangail</option>");
    }

    if (divisionId === 4) {
        $('#personaldistrict').append("<option data-division='4' value='55'>Bagerhat</option>");
        $('#personaldistrict').append("<option data-division='4' value='56'>Chuadanga</option>");
        $('#personaldistrict').append("<option data-division='4' value='57'>Jashore</option>");
        $('#personaldistrict').append("<option data-division='4' value='58'>Jhenaidah</option>");
        $('#personaldistrict').append("<option data-division='4' value='59'>Khulna</option>");
        $('#personaldistrict').append("<option data-division='4' value='60'>Kushtia</option>");
        $('#personaldistrict').append("<option data-division='4' value='61'>Magura</option>");
        $('#personaldistrict').append("<option data-division='4' value='62'>Meherpur</option>");
        $('#personaldistrict').append("<option data-division='4' value='63'>Narail</option>");
        $('#personaldistrict').append("<option data-division='4' value='64'>Satkhira</option>");
    }

    if (divisionId === 8) {
        $('#personaldistrict').append("<option data-division='8' value='5'>Jamalpur</option>");
        $('#personaldistrict').append("<option data-division='8' value='10'>Mymensingh</option>");
        $('#personaldistrict').append("<option data-division='8' value='13'>Netrokona</option>");
        $('#personaldistrict').append("<option data-division='8' value='16'>Sherpur</option>");
    }

    if (divisionId === 5) {
        $('#personaldistrict').append("<option data-division='5' value='18'>Bogura</option>");
        $('#personaldistrict').append("<option data-division='5' value='19'>Joypurhat</option>");
        $('#personaldistrict').append("<option data-division='5' value='20'>Naogaon</option>");
        $('#personaldistrict').append("<option data-division='5' value='21'>Natore</option>");
        $('#personaldistrict').append("<option data-division='5' value='22'>Nawabganj</option>");
        $('#personaldistrict').append("<option data-division='5' value='23'>Pabna</option>");
        $('#personaldistrict').append("<option data-division='5' value='24'>Rajshahi</option>");
        $('#personaldistrict').append("<option data-division='5' value='25'>Sirajgonj</option>");
    }

    if (divisionId === 6) {
        $('#personaldistrict').append("<option data-division='6' value='26'>Dinajpur</option>");
        $('#personaldistrict').append("<option data-division='6' value='27'>Gaibandha</option>");
        $('#personaldistrict').append("<option data-division='6' value='28'>Kurigram</option>");
        $('#personaldistrict').append("<option data-division='6' value='29'>Lalmonirhat</option>");
        $('#personaldistrict').append("<option data-division='6' value='30'>Nilphamari</option>");
        $('#personaldistrict').append("<option data-division='6' value='31'>Panchagarh</option>");
        $('#personaldistrict').append("<option data-division='6' value='32'>Rangpur</option>");
        $('#personaldistrict').append("<option data-division='6' value='33'>Thakurgaon</option>");
    }

    if (divisionId === 7) {
        $('#personaldistrict').append("<option data-division='7' value='51'>Habiganj</option>");
        $('#personaldistrict').append("<option data-division='7' value='52'>Maulvibazar</option>");
        $('#personaldistrict').append("<option data-division='7' value='53'>Sunamganj</option>");
        $('#personaldistrict').append("<option data-division='7' value='54'>Sylhet</option>");
    }


    $('#personaldistrict').removeAttr('disabled');
}

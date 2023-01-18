$(function () {
    // auto logout
    var inactivityTime = function () {
        var time;
        window.onload = resetTimer;
        // DOM Events
        document.onload = resetTimer;
        document.onmousemove = resetTimer;
        document.onmousedown = resetTimer; // touchscreen presses
        document.ontouchstart = resetTimer;
        document.onclick = resetTimer; // touchpad clicks
        document.onkeydown = resetTimer; // onkeypress is deprectaed
        document.addEventListener('scroll', resetTimer, true); // improved; see comments

        function logout() {

            $.ajax({
                type: "GET",
                url: "home/logout",
                async: false,
                success: function () {
                    if (confirm('Sesi login Anda Telah Berakhir\nSilahkan Melakukan Login Ulang ')) {
                        window.location.reload();
                    } else {
                        window.location.reload();

                    }
                }
            });
        }


        function resetTimer() {
            clearTimeout(time);
            time = setTimeout(logout, 5 * 1000 * 60 )
            // 1000 milliseconds = 1 second
        }
    };
    inactivityTime();



});
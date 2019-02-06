$(document).ready(function () {
    $('.slide-container').slideWiz(
        {
            auto: true,
            speed: 30000,
            type : 'box3D',
            file : [
                {
                    src: "assets/slidewiz/img/1.jpg",
                    title: 'jQuery slideWiz Plugin',
                    desc: 'Description 1',
                    btnTitle: 'Action Button',
                    btnUrl: 'https://www.jqueryscript.net/'
                },
                 {
                    src: "assets/slidewiz/img/2.jpg",
                    title: 'jQuery slideWiz Plugin',
                    desc: 'Description 2',
                    btnTitle: 'Action Button',
                    btnUrl: 'https://www.jqueryscript.net/'
                },
                 {
                    src: "assets/slidewiz/img/3.jpg",
                    title: 'jQuery slideWiz Plugin',
                    desc: 'Description 3',
                    btnTitle: 'Action Button',
                    btnUrl: 'https://www.jqueryscript.net/'
                },
                 
            ]

        }
    );
});

// global/////header and side bar///////////////////////////////////////////////////////////////////////////////////////
$(".openMenuBtn").click(function () {
    openMenu();
});
$("#sideMenuCloseBtn").click(function () {
    closeMenu();
});

$("#sideMenuBackdrop").click(function () {
    closeMenu();
});
function closeMenu() {
    $("#sideMenu").css("transform", "translateX(100%)");
    $("#sideMenuBackdrop").fadeOut(300);
}
function openMenu() {
    $("#sideMenuBackdrop").fadeIn(300);
    $("#sideMenu").css("transition", "transform 0.3s ease-in-out");
    $("#sideMenu").css("transform", "translateX(0)");
}

$(".openMenuHover").click(function () {
    $("#categoriesMenu").fadeIn(200);
    $("#categoriesMenuBackdrop").fadeIn(200);
});
$("#categoriesMenuBackdrop").click(function () {
    $("#categoriesMenu").fadeOut(200);
    $("#categoriesMenuBackdrop").fadeOut(200);
});

$("#openCitiesFilter").click(function () {
    $("#citiesFilter").fadeIn(300);
});
$("#closeCitiesFilter").click(function () {
    $("#citiesFilter").fadeOut(300);
});

$("#shareButton").click(function () {
    $("#shareModal").fadeIn(300);
});
$("#closeShareModal").click(function () {
    $("#shareModal").fadeOut(300);
});


$("#provinceList li").click(function () {
    let selectedProvince = $(this).data("province");

    $("input[name='searchCity']").val(selectedProvince);
    $("#selectedProvince").text(selectedProvince);

    $("#citiesFilter").fadeOut(300);
});


// ad carousel
var adsSwiper = new Swiper(".adsSwiper", {
    slidesPerView: 1,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 3500,
        disableOnInteraction: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
        },
        1000: {
            slidesPerView: 3,
        },
        1400: {
            slidesPerView: 4,
        },
    },
});


//single ad page///////////////////////////////////////////////////////////////////////////////////////////////////////
let galerySwiper = new Swiper("#galerySwiper", {
    slidesPerView: 4,
    spaceBetween:10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

$(document).ready(function () {
    $('#galerySwiper .swiper-slide img').click(function () {
        var newImageSrc = $(this).attr('src');
        $('#mainImage').attr('src', newImageSrc);
        $('#mainImageModal').attr('src', newImageSrc);
    });
});

$(".openZoomImageModal").click(function () {
    $("#zoomImageModal").fadeIn(300);
});
$("#zoomImageModal").click(function () {
    $("#zoomImageModal").fadeOut(300);
});

//ads page//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$("#openAdsFilters").click(function () {
    $("#adsFilters").fadeIn(300);
});
$("#closeAdsFilters").click(function () {
    $("#adsFilters").fadeOut(300);
});

$(".title").click(function () {
    $(this).siblings('.detail').slideToggle(200);
    $(this).children('svg').toggleClass('rotate-180');
});

//user panel////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('[data_toggle_value]').on('click', function() {
        var modalId = $(this).attr('data_toggle_value');
        $('#' + modalId).toggleClass('hidden');
    });
});
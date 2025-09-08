let countdown;
function startCountdown() {
    let timeLeft = 60;
    const counterElement = document.getElementById('counter');
    const resendBtn = document.getElementById('resend-btn');

    resendBtn.classList.add('hidden'); // مخفی کردن دکمه در شروع تایمر

    if (countdown) clearInterval(countdown); // متوقف کردن تایمر قبلی

    countdown = setInterval(() => {
        if (timeLeft <= 0) {
            clearInterval(countdown);
            counterElement.textContent = '0';
            resendBtn.classList.remove('hidden'); // دکمه را نمایش بده
        } else {
            counterElement.textContent = timeLeft;
            timeLeft--;
        }
    }, 1000);
}

// اجرای تایمر در بارگذاری صفحه
document.addEventListener('DOMContentLoaded', startCountdown);

function showMessage(message, type = 'success') {
    const box = $('#message-box');
    box.removeClass('hidden bg-green-500/50 bg-red-500/50 bg-yellow-500/50');

    if (type === 'success') {
        box.addClass('bg-green-500/50');
    } else if (type === 'error') {
        box.addClass('bg-red-500/50');
    } else {
        box.addClass('bg-yellow-500/50');
    }
    box.text(message);
    box.fadeIn();
    setTimeout(() => {
        box.fadeOut();
    }, 5000);
}
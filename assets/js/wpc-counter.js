document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".wpc-counter-number");

    counters.forEach(counter => {
        const update = () => {
            const target = +counter.getAttribute("data-target");
            const count = +counter.innerText;

            const increment = target / 200;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(update, 20);
            } else {
                counter.innerText = target;
            }
        };

        update();
    });
});
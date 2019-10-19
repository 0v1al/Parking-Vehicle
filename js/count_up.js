$(() => {
    $('.counter').each(function() {
        let $this = $(this);
        let count_to = $this.attr('data-value');
        $({count_number: $this.text()}).animate({
            count_number: count_to
        }, {
            duration: 3000,
            easing: 'linear',
            step() {
                $this.text(Math.floor(this.count_number));
            },
            complete() {
                $this.text(this.count_number);
            }
        });
    });
});	
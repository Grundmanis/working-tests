document.addEventListener('alpine:init', () => {
    Alpine.data('counter', () => ({
        count: 0,
        increment() {
            this.count++
        },
    }));

    Alpine.data('dropdown', () => ({
        open: false,
        toggle() {
            this.open = !this.open
        },
    }));
});
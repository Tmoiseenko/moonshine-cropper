document.addEventListener('alpine:init', () => {
    Alpine.data('cropper', () => ({
        open: false,
        file: null,
        cropperInstance: null,

        init() {
            this.$el.addEventListener('file-uploaded', (event) => {
                const reader = new FileReader();

                reader.onload = (e) => {

                    const imageElement = this.$refs.cropperImage;
                    console.log(imageElement)
                    imageElement.src = e.target.result;

                    if (this.cropperInstance) {
                        this.cropperInstance.destroy();
                    }
                    this.cropperInstance = new Cropper(imageElement, {
                        responsive: true,
                    });

                    this.open = true
                };

                reader.readAsDataURL(this.file);
            });
        },

        handleFileChange(event) {
            this.file = event.target.files[0];
            const t = this
            if (!this.file) return;

            const reader = new FileReader();
            this.$dispatch('file-uploaded', { file: this.file });
        },

        cropImage() {
            url = this.$el.dataset.url

        },

        toggleModal() {
            this.open = !this.open
        }
    }));
});

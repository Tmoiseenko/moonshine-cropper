document.addEventListener('alpine:init', () => {
    Alpine.data('cropper', () => ({
        open: false,
        dontOpen: true,
        file: null,
        cropperInstance: null,

        init() {
            this.$el.addEventListener('file-uploaded', (event) => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const imageElement = this.$refs.cropperImage;
                    imageElement.src = e.target.result;
                    if (this.cropperInstance) {
                        this.cropperInstance.destroy();
                    }
                    this.cropperInstance = new Cropper(imageElement, {
                        responsive: true,
                    });
                    this.toggleModal();
                };
                reader.readAsDataURL(this.file);
            });
        },

        handleFileChange(event) {
            if(this.dontOpen) {
                this.file = event.target.files[0];
                const t = this
                if (!this.file) return;
                const reader = new FileReader();
                this.$dispatch('file-uploaded', { file: this.file });
                this.dontOpen = false
            }
        },

        cropImage() {
            const croppedCanvas = this.cropperInstance.getCroppedCanvas();
            if (!croppedCanvas) {
                alert('Error: Failed to get cropped image.');
                return;
            }
            croppedCanvas.toBlob((blob) => {
                if (!blob) {
                    alert('Error: Failed to convert image.');
                    return;
                }
                const mimeType = blob.type;
                const fileName = `cropped-image-${Date.now()}.${mimeType.split('/')[1]}`;
                const croppedFile = new File([blob], fileName, { type: mimeType });
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(croppedFile);
                const fileInput = document.querySelector('input[type="file"]');
                if (fileInput) {
                    fileInput.files = dataTransfer.files;
                    fileInput.dispatchEvent(new Event('change'));

                }
                this.toggleModal();
            });
        },

        toggleModal() {
            this.open = !this.open
        }
    }));
});

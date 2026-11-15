const { createApp } = Vue;

createApp({
    data() {
        return {
            products: [],

            form: {
                name: "",
                price: "",
                stock: ""
            },

            isEditing: false,
            editingId: null,

            message: "",
            messageType: "success"
        };
    },

    methods: {
        // Hiển thị thông báo
        showMessage(message, type = "success") {
            this.message = message;
            this.messageType = type;
        },

        // Lấy danh sách sản phẩm
        async loadProducts() {
            try {
                const response = await fetch("../api/products.php");

                const result = await response.json();

                if (!response.ok || !result.success) {
                    throw new Error(
                        result.message || "Không thể tải dữ liệu"
                    );
                }

                this.products = result.data;

            } catch (error) {
                this.showMessage(error.message, "error");
            }
        },

        // Reset form
        resetForm() {
            this.form = {
                name: "",
                price: "",
                stock: ""
            };

            this.isEditing = false;
            this.editingId = null;
        },

        // Thêm hoặc cập nhật sản phẩm
        async saveProduct() {
            const url = this.isEditing
                ? `../api/products.php?id=${this.editingId}`
                : "../api/products.php";

            const method = this.isEditing ? "PUT" : "POST";

            try {
                const response = await fetch(url, {
                    method: method,

                    headers: {
                        "Content-Type": "application/json"
                    },

                    body: JSON.stringify(this.form)
                });

                const result = await response.json();

                if (!response.ok || !result.success) {
                    throw new Error(
                        result.message || "Có lỗi xảy ra"
                    );
                }

                this.showMessage(result.message);

                this.resetForm();

                await this.loadProducts();

            } catch (error) {
                this.showMessage(error.message, "error");
            }
        },

        // Chọn sản phẩm để sửa
        editProduct(product) {

            this.form = {
                name: product.name,
                price: Number(product.price),
                stock: Number(product.stock)
            };

            this.isEditing = true;
            this.editingId = product.id;
        },

        // Xóa sản phẩm
        async deleteProduct(id) {

            const confirmDelete = confirm(
                "Bạn có chắc chắn muốn xóa sản phẩm này không?"
            );

            if (!confirmDelete) {
                return;
            }

            try {
                const response = await fetch(
                    `../api/products.php?id=${id}`,
                    {
                        method: "DELETE"
                    }
                );

                const result = await response.json();

                if (!response.ok || !result.success) {
                    throw new Error(
                        result.message || "Xóa thất bại"
                    );
                }

                this.showMessage(result.message);

                if (this.editingId === id) {
                    this.resetForm();
                }

                await this.loadProducts();

            } catch (error) {
                this.showMessage(error.message, "error");
            }
        }

    },

    // Tự động gọi API khi mở trang
    mounted() {
        this.loadProducts();
    }

}).mount("#app");

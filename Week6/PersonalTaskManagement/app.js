// Lấy hàm createApp từ Vue
const { createApp } = Vue;

createApp({
    // 1. Khai báo dữ liệu
    data() {
        return {
            // Danh sách công việc ban đầu
            tasks: [],

            // Tên công việc đang nhập
            newTask: "",

            // ID của công việc tiếp theo
            nextId: 1,

            // Trạng thái lọc mặc định
            currentFilter: "all"
        };
    },

    // 2. Các giá trị được tính toán tự động
    computed: {
        // Tổng số công việc
        totalTasks() {
            return this.tasks.length;
        },

        // Số công việc chưa hoàn thành
        incompleteTasks() {
            return this.tasks.filter(task => !task.completed).length;
        },

        // Số công việc đã hoàn thành
        completedTasks() {
            return this.tasks.filter(task => task.completed).length;
        },

        // Danh sách công việc sau khi lọc
        filteredTasks() {
            if (this.currentFilter === "incomplete") {
                return this.tasks.filter(task => !task.completed);
            }

            if (this.currentFilter === "completed") {
                return this.tasks.filter(task => task.completed);
            }

            // Nếu chọn "Tất cả"
            return this.tasks;
        }
    },

    // 3. Các phương thức xử lý
    methods: {
        // Thêm công việc
        addTask() {

            // Loại bỏ khoảng trắng đầu và cuối
            const taskName = this.newTask.trim();

            // Không cho thêm tên rỗng
            if (taskName === "") {
                return;
            }

            // Tạo công việc mới
            const task = {
                id: this.nextId,
                name: taskName,
                completed: false
            };

            // Thêm vào danh sách
            this.tasks.push(task);

            // Tăng ID cho công việc tiếp theo
            this.nextId++;

            // Xóa nội dung ô nhập
            this.newTask = "";
        },

        // Xóa một công việc theo ID
        deleteTask(id) {
            this.tasks = this.tasks.filter(
                task => task.id !== id
            );
        },

        // Xóa tất cả công việc đã hoàn thành
        clearCompleted() {
            this.tasks = this.tasks.filter(
                task => !task.completed
            );
        }
    }

}).mount("#app");
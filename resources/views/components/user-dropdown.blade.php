<div x-data="userSelector()" class="space-y-4">
    <!-- Dropdown -->
    <select x-model="selectedUser" @change="addUser()" class="w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100">
        <option value="">Select a user</option>
        <template x-for="user in availableUsers" :key="user.id">
            <option :value="user.id" x-text="user.name"></option>
        </template>
    </select>

    <!-- Selected Users List -->
    <div>
        <h3>Selected Users:</h3>
            <template x-for="user in selectedUsers" :key="user.id">
                <div class="flex justify-between bg-gray-200 dark:bg-gray-700 p-2 rounded-md mb-2">
                    <span x-text="user.name" class="dark:text-gray-200"></span>
                    <button @click="removeUser(user)" class="text-red-500">Remove</button>
                </div>
            </template>

        <div x-show="selectedUsers.length === 0" class="flex mb-2 justify-between bg-gray-200 dark:bg-gray-700 p-2 rounded-md">
            No users selected.
        </div>
        <input type="hidden" name="users" :value="JSON.stringify(selectedUsers)">
    </div>
</div>

<script>
function userSelector() {
    return {
        selectedUser: '',
        availableUsers: @json($users),
        selectedUsers: @json($selected),

        addUser() {
            if (!this.selectedUser) return;

            const user = this.availableUsers.find(u => u.id == this.selectedUser);
            if (user) {
                this.selectedUsers.push(user);
                this.availableUsers = this.availableUsers.filter(u => u.id != this.selectedUser);
            }
            this.selectedUser = ''; // reset dropdown
        },

        removeUser(user) {
            this.selectedUsers = this.selectedUsers.filter(u => u.id != user.id);
            this.availableUsers.push(user);
            // optional: sort dropdown by id or name
            this.availableUsers.sort((a, b) => a.id - b.id);
        }
    }
}
</script>

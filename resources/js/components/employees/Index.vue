<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>
        <div class="row">
            <div class="card mx-auto">
                <div v-if="showMessage">
                    <div class="alert alert-success">{{ message }}</div>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form method="GET">
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input
                                            type="text"
                                            name="search"
                                            class="form-control mb-2"
                                            id="inlineFormInput"
                                            placeholder="Search.."
                                        />
                                    </div>
                                    <div class="col">
                                        <button
                                            type="submit"
                                            class="btn btn-primary mb-2"
                                        >
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <router-link
                                :to="{ name: 'EmployeesCreate' }"
                                class="btn btn-primary mb-2"
                            >
                                Create
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">Last name</th>
                                <th scope="col">First name</th>
                                <th>Middle name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Department</th>
                                <th scope="col">Country</th>
                                <th scope="col">State</th>
                                <th scope="col">City</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="employee in employees"
                                :key="employee.id"
                            >
                                <th scope="row">{{ employee.id }}</th>
                                <th>{{ employee.last_name }}</th>
                                <th>{{ employee.first_name }}</th>
                                <th>{{ employee.middle_name }}</th>
                                <th>{{ employee.address }}</th>
                                <th>{{ employee.department_id }}</th>
                                <th>{{ employee.country_id }}</th>
                                <th>{{ employee.state_id }}</th>
                                <th>{{ employee.city_id }}</th>
                                <th>
                                    <router-link
                                        :to="{
                                            name: 'EmployeesEdit',
                                            params: { id: employee.id }
                                        }"
                                        class="btn btn-primary"
                                    >
                                        Edit
                                    </router-link>
                                    <button
                                        class="btn btn-danger ml-2"
                                        @click="deleteEmployee(employee.id)"
                                    >
                                        Delete
                                    </button>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            employees: [],
            showMessage: false,
            message: ""
        };
    },
    created() {
        this.getEmployees();
    },

    methods: {
        getEmployees() {
            axios
                .get("/api/employees")
                .then(res => (this.employees = res.data.data))
                .catch(error => console.log(error));
        },
        deleteEmployee(id) {
            axios
                .delete("/api/employees/" + id)
                .then(res => {
                    this.getEmployees();
                    this.showMessage = true;
                    this.message = res.data
                })
                .catch(error => console.log(error));
        }
    }
};
</script>

<style></style>

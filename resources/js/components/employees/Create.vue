<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Create new employee
                            <router-link
                                :to="{ name: 'EmployeesIndex' }"
                                class="float-right"
                                >Back</router-link
                            >
                        </div>

                        <div class="card-body">
                            <form @submit.prevent="storeEmployee">
                                <div class="form-group row">
                                    <label
                                        for="last_name"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Last Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            v-model="form.last_name"
                                            id="last_name"
                                            type="text"
                                            class="form-control "
                                            name="last_name"
                                            required
                                            autocomplete="name"
                                            autofocus
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="first_name"
                                        class="col-md-4 col-form-label text-md-right"
                                        >First Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="first_name"
                                            type="text"
                                            v-model="form.first_name"
                                            class="form-control "
                                            name="first_name"
                                            required
                                            autocomplete="name"
                                            autofocus
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="middle_name"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Middle Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="middle_name"
                                            type="text"
                                            v-model="form.middle_name"
                                            class="form-control "
                                            name="midlle_name"
                                            required
                                            autocomplete="name"
                                            autofocus
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="address"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Address</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="address"
                                            type="text"
                                            class="form-control "
                                            name="address"
                                            v-model="form.address"
                                            required
                                            autocomplete="name"
                                            autofocus
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="country_id"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Country Id</label
                                    >
                                    <div class="col-md-6">
                                        <select
                                            v-model="form.country_id"
                                            name="country_id"
                                            @change="getStates()"
                                            class="form-control"
                                        >
                                            <option
                                                v-for="country in countries"
                                                :key="country.id"
                                                :value="country.id"
                                                >{{ country.name }}</option
                                            >
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="state_id"
                                        class="col-md-4 col-form-label text-md-right"
                                        >State Id</label
                                    >

                                    <div class="col-md-6">
                                        <select
                                            name="state_id"
                                            v-model="form.state_id"
                                            @change="getCities()"
                                            class="form-control"
                                        >
                                            <option
                                                v-for="state in states"
                                                :key="state.id"
                                                :value="state.id"
                                                >{{ state.name }}</option
                                            >
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="city_id"
                                        class="col-md-4 col-form-label text-md-right"
                                        >City Id</label
                                    >

                                    <div class="col-md-6">
                                        <select
                                            v-model="form.city_id"
                                            name="city_id"
                                            class="form-control"
                                        >
                                            <option
                                                v-for="city in cities"
                                                :key="city.id"
                                                :value="city.id"
                                                >{{ city.name }}</option
                                            >
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="department_id"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Department Id</label
                                    >

                                    <div class="col-md-6">
                                        <select
                                            v-model="form.department_id"
                                            name="department_id"
                                            class="form-control"
                                        >
                                            <option
                                                v-for="department in departments"
                                                :key="department.id"
                                                :value="department.id"
                                            >
                                                {{ department.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="zip_code"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Zipcode</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="zip_code"
                                            v-model="form.zip_code"
                                            type="text"
                                            class="form-control "
                                            name="zip_code"
                                            required
                                            autocomplete="name"
                                            autofocus
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="birthdate"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Birthdate</label
                                    >

                                    <div class="form-group col-md-6">
                                        <datepicker
                                            v-model="form.birthdate"
                                            input-class="form-control"
                                        ></datepicker>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="date_hired"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Date hired</label
                                    >

                                    <div class="col-md-6">
                                        <datepicker
                                            v-model="form.date_hired"
                                            input-class="form-control"
                                        ></datepicker>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import axios from "axios";
import moment from "moment";

export default {
    components: {
        Datepicker
    },
    data() {
        return {
            countries: [],
            states: [],
            departments: [],
            cities: [],
            form: {
                first_name: "",
                middle_name: "",
                last_name: "",
                address: "",
                country_id: "",
                state_id: "",
                department_id: "",
                city_id: "",
                zip_code: "",
                birthdate: null,
                date_hired: null
            }
        };
    },
    created() {
        this.getCountries();
        this.getDepartment();
    },
    methods: {
        format_date(value) {
            if (value) {
                return moment(String(value)).format("YYYYMMDD");
            }
        },
        getCountries() {
            axios
                .get("/api/employees/countries")
                .then(res => {
                    this.countries = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        getStates() {
            axios
                .get("/api/employees/" + this.form.country_id + "/states")
                .then(res => {
                    this.states = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getCities() {
            axios
                .get("/api/employees/" + this.form.state_id + "/cities")
                .then(res => {
                    this.cities = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getDepartment() {
            axios
                .get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data;
                })
                .catch(erorr => {
                    console.log(error);
                });
        },
        storeEmployee() {
            axios
                .post("/api/employees", {
                    first_name: this.form.first_name,
                    last_name: this.form.last_name,
                    middle_name: this.form.middle_name,
                    address: this.form.address,
                    department_id: this.form.department_id,
                    country_id: this.form.country_id,
                    state_id: this.form.state_id,
                    city_id: this.form.city_id,
                    zip_code: this.form.zip_code,
                    birthdate: this.format_date(this.form.birthdate),
                    date_hired: this.format_date(this.form.date_hired)
                })
                .then(res =>{
                    this.$router.push({name:'EmployeesIndex'})
                })
                .catch(error => console.log(error));
        }
    }
};
</script>

<style></style>

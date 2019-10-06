<template>
    <div>
        <form @submit.prevent="add">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" v-model="contact.name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" v-model="contact.email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" v-model="contact.phone" id="phone" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        <div v-if="errors" class="text-danger">
            <ul>
                <li v-for="(fieldsError, fieldName) in errors" :key="fieldName">
                    <strong>{{ fieldName }}</strong> {{ fieldsError.join("\n") }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import validate from 'validate.js';
    export default {
        name: 'create',
        data() {
            return {
                contact: {
                    name: '',
                    email: '',
                    phone: ''
                },
                errors: null
            };
        },
        methods: {
            add() {
                this.errors = null;
                const constraints = this.getConstraints();

                const errors = validate(this.$data.contact, constraints);

                if (errors) {
                    this.errors = errors;
                    return;
                }

                axios.post('/api/contacts', this.$data.contact)
                    .then((response) => {
                        this.$router.push('/contacts');

                    });
            },
            getConstraints() {
                return {
                    name: {
                        presence: true,
                        length: {
                            minimum: 2,
                            message: 'Must be at least 2 characters'
                        }
                    },
                    email: {
                        presence: true,
                        email: true
                    },
                    phone: {
                        presence: true,
                        numericality: true,
                        length: {
                            minimum: 10,
                            message: 'Must be at least 10 digits'
                        }
                    }
                }
            }
        }
    }
</script>
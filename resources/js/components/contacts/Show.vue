<template>
    <div v-if="contact" class="row">
        <div class="col">
            <table class="table">
                <tr>
                    <td>ID</td>
                    <td>{{ contact.id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ contact.name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ contact.email }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ contact.phone }}</td>
                </tr>
            </table>
            <router-link class="btn btn-primary" to="/">Back</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'show',
        data() {
            return {
                contact: null
            }
        },
        created() {
            if (this.contacts.length) {
                this.contact = this.contacts.find((contact) => contact.id == this.$route.params.id);
            } else {
                axios.get(`/api/contacts/${this.$route.params.id}`)
                    .then((res) => {
                        this.contact = res.data.contact;
                    });
            }

        },
        computed: {
            contacts() {
                return this.$store.getters.contacts;
            }
        }

    }
</script>
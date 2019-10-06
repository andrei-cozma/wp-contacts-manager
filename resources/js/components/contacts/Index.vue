<template>
    <div>
        <div class="row">
            <div class="col mb-2">
                <router-link to="/contacts/create" class="btn btn-primary">Create</router-link>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <template v-if="!contacts.length">
                <tr>
                    <td colspan="4" class="text-center">No Contacts Available</td>
                </tr>
            </template>
            <template v-else>
                <tr v-for="contact in contacts" :key="contact.id">
                    <td>{{ contact.name }}</td>
                    <td>{{ contact.email }}</td>
                    <td>{{ contact.phone }}</td>
                    <td><router-link :to="`/contacts/${contact.id}`">View</router-link></td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'index',
        mounted() {
          this.$store.dispatch('getContacts');
        },
        computed: {
            contacts() {
                return this.$store.getters.contacts;

            }
        }
    }
</script>
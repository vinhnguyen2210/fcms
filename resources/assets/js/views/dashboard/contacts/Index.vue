<template>
    <data-viewer :source="source" :thead="thead" :filter="filter" :create="create" :title="title">
        <template scope="props">
            <tr @click="$router.push('/contacts/' + props.item.id)">
                <td>{{props.item.id}}</td>
                <td>{{props.item.contact_name}}</td>
                <td>{{props.item.email_address}}</td>
                <td>{{props.item.job_title}}</td>
                <td>{{props.item.company}}</td>
                <td>{{props.item.created_at}}</td>
            </tr>
        </template>
    </data-viewer>
</template>
<script>
    import DataViewer from '../../../components/DataViewer.vue'

    export default {
        name: 'ContactIndex',
        data() {
            return {
                title: 'Contacts',
                source: '/api/contacts',
                create: '/contacts/create',
                thead: [
                    {title: 'ID', key: 'id', sort: true},
                    {title: 'Contact Name', key: 'contact_name', sort: true},
                    {title: 'Email', key: 'email_address', sort: true},
                    {title: 'Job Title', key: 'job_title', sort: true},
                    {title: 'Company', key: 'company', sort: true},
                    {title: 'Created At', key: 'created_at', sort: true}
                ],
                filter: [
                    'id', 'contact_name', 'email_address', 'job_title', 'company', 'created_at'
                ]
            }
        },
        components: {
            DataViewer
        }
    }
</script>

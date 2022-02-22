<template>
    <ul
        style="max-height:500px; " class="chat overflow-scroll overflow-hidden">
        <li class="left clearfix" v-for="message in chatData.messages" :key="message.id">
            <div class="clearfix" :class="{'bg-success': (message.user.id === chatData.authUser.id)}">
                <div class="header">
                    <strong>
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        mounted() {

        },
        props: ['chat-data'],
    }
</script>

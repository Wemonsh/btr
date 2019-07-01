<template>
    <div class="messages">
        <div class="message" v-for="(message, index) in messages" :key="index">
            <img src="/img/avatar.png" alt="">
            <p><a href="#">{{ message.user.name }}</a> <span class="date">20:00</span></p>
            <p class="text">{{ message.message }}</p>
        </div>

            <span class="text-muted">user is typing...</span>
            <input @keyup.enter="sendMessage"
                   v-model="newMessage"
                    type="text"
                   name="message"
                   placeholder="Написать сообщение …"/>
    </div>
</template>

<script>
    export default {
        props: ['user', 'order'],

        data() {
            return {
                messages: [],
                newMessage: ''
            }
        },
        created() {
            this.fetchMessages();

            console.log(this.order);

            Echo.join('chat')
                .listen('MessageSend', (event) => {
                    if (event.message.order_id == this.order) {
                        this.messages.push(event.message);
                    }
                });

        },
        methods: {
            fetchMessages() {
                axios.get('/profile/messages', { params: { order: this.order } }).then(response => {
                    this.messages = response.data;
                })
            },
            sendMessage() {
                this.messages.push({
                    user: this.user,
                    message: this.newMessage,
                });
                axios.post('/profile/messages', {message: this.newMessage, order: this.order});
                this.newMessage = '';
            }
        }
    }
</script>

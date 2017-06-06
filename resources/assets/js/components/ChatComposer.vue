<template lang="html">
  <div class="chat-composer">
      <input type="text" v-model="messageText" @keyup.enter="sendMessage">
      <button class="btn btn-success" @click="sendMessage">Send</button>
  </div>
</template>

<script>
export default {
    data() {
        return {
            messageText: ''
        }
    },
    methods: {
        sendMessage() {
            this.$emit('messagesent', {
                message: this.messageText,
                user: {
                    name: 'Darinel Cruz'
                }
            });
            console.log(this.messageText);
            this.messageText = '';
        }
    }
}
</script>

<style lang="css">
    .chat-composer {
        display: flex;
    }

    .chat-composer input {
        flex: 1 auto;
        padding: .5rem 1rem;
    }

    .chat-composer button {
        border-radius: 0;
    }
</style>

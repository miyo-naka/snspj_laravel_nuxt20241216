<template>
  <div>
    <div class="home">
      <h2>コメント</h2>
      <Message :postId="postId"></Message>
      <div class="comment">
        <h3>コメント</h3>
        <div class="comment-item" v-for="comment in comments" :key="comment.id">
          <p>{{ comment.user.name }}</p>
          <p>{{ comment.comment }}</p>
        </div>
        <input v-model="newComment" name="comment" id="comment" type="text" />
        <button @click="handleAddComment">コメント</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Message from "@/components/Message.vue";

export default {
  data() {
    return {
      postId: null, // 動的ルートから取得
      comments: [], // コメント一覧
      newComment: "", // 新しいコメント入力内容
    };
  },

  methods: {
    async getComments() {
      const resComments = await axios.get(
        `http://127.0.0.1:8000/api/posts/${this.postId}/comments`
      );
      this.comments = resComments.data.data;
      console.log("getComments data:", resComments.data);
    },

    async handleAddComment() {
      if (this.newComment) {
        const newComment = {
          comment: this.newComment,
          user_id: 1,
        };
        await this.insertComment(newComment);
      }
    },
    async insertComment(newComment) {
      const response = await this.$axios.post(
        `http://127.0.0.1:8000/api/posts/${this.postId}/comments`,
        newComment
      );
      console.log("Comment created:", response.data);
      this.newComment = "";
      this.getComments();
    },
  },

  created() {
    this.postId = this.$route.params.postId;
    this.getComments();
  },
};
</script>

<style scoped>
.home {
  width: 80vw;
  margin: 0;
}
.comment {
  width: 100%;
}
h2,
.comment h3,
.comment-item {
  border: 1px solid gray;
  padding: 10px;
  margin: 0;
}
.comment h3 {
  border-top: none;
  line-height: 12px;
  text-align: center;
}
.comment-item {
  border-top: none;
  line-height: 20px;
}
.comment-item p {
  margin: 0;
}
.comment input {
  border: 1px solid gray;
  border-radius: 10px;
  display: block;
  width: 95%;
  margin: 15px auto;
  line-height: 30px;
}
.comment button {
  display: block;
  margin: 0 0 0 auto;
  background-color: blue;
  height: 40px;
  width: 100px;
  border-radius: 20px;
}
</style>

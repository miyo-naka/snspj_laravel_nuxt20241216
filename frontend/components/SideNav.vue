<template>
  <div class="SideNav">
    <h1>SHARE</h1>
    <a href="/">ホーム</a>
    <a href="">ログアウト</a>
    <p>シェア</p>
    <textarea v-model="post" name="post" id="post"></textarea>
    <button @click="handleAddPost">シェアする</button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      post: "",
    };
  },

  methods: {
    async handleAddPost() {
      if (this.post) {
        const newPost = {
          post: this.post,
          user_id: 1,
        };
        await this.insertPost(newPost);
      }
    },
    async insertPost(newPost) {
      const response = await this.$axios.post(
        "http://127.0.0.1:8000/api/posts/",
        newPost
      );
      console.log("Post created:", response.data);
      this.post = "";
    },
  },
};
</script>

<style scoped>
.SideNav {
  width: 20vw;
  padding: 0 20px;
  display: flex;
  flex-direction: column;
}
.SideNav a {
  text-decoration: none;
  padding-bottom: 10px;
}
.SideNav textarea {
  height: 100px;
  border-radius: 5px;
  margin-bottom: 10px;
}
.SideNav button {
  margin: 0 0 0 auto;
  background-color: blue;
  height: 40px;
  width: 100px;
  border-radius: 20px;
}
</style>

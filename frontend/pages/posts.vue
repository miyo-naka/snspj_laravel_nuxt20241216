<template>
  <div>
    <div class="home">
      <h2>コメント</h2>
      <Message></Message>
      <div class="comment">
        <h3>コメント</h3>
        <div class="post_content">
          <p>comment test</p>
          <p>test comment</p>
        </div>
        <input type="text" />
        <button>コメント</button>
      </div>
    </div>
  </div>
</template>

<script>
// export default {
//   data() {
//     return {
//       post: null,
//       commens;[],
//     }
//   }
// }
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
.post_content {
  border: 1px solid gray;
  padding: 10px;
  margin: 0;
}
.comment h3 {
  border-top: none;
  line-height: 12px;
  text-align: center;
}
.post_content {
  border-top: none;
  line-height: 12px;
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

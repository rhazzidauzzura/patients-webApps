<script>
import axios from 'axios'
import { useStateStore } from "../stores/state";
import { mapActions, mapState } from "pinia";

const baseUrl = "http://localhost:8000"

export default {
  props: ['data', 'fetchData'],
  methods: {
    ...mapActions(useStateStore, ["handleDelete", "fetchData"]),
    handleDestroy(id) {
      this.handleDelete(id);
    },
  },
  // created() {
  //   this.fetchData();
  // },
}
</script>

<template>
  
      <!-- {/* row 1 */} -->
      <tr class="hover:cursor-pointer">
        <td @click.prevent="$router.push(`/detail/${data?.id}`)">
          <div className="flex items-center space-x-2">
            <div className="avatar">
              <div className="mask mask-squircle w-12 h-12">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAbFBMVEX///8AAAAwMDDb29u6urq/v7/s7Oz39/f6+vri4uK1tbVeXl43Nzfq6uqGhobGxsaoqKiamppGRkZ1dXVRUVHR0dFXV1cnJydqamrLy8uBgYFkZGQUFBQsLCyenp6KiooeHh4/Pz9CQkIWFhbAcTlJAAAFFklEQVR4nO3d25qqOBAF4A4KCKLg+dBtoz3v/44jw3Y8gUJqhSp613/jLesDcqiE+PGhlFJKKaWUUkoppZRSSin1lwnSbD+eJ57nJfPxPksD7guCmmRb8+wzm3BfGMZk9lMRr/Qz63/IdFwbrzT2uS+RxN+8yVc4DLkv09rOa5CvkOy4L9VKUNW61Nn2sGmNW+QrxNwX3NZny4DnJof7kluJmr6Bt7yI+7Kb21nkK/SmwfEtAxrTk76xbRtzqxddo/0d7MldXJECGrPiDvBOQAxojPS+PyEnTLgjvLYgBzRmzx3iFVorcyG4tQkhAY0JuYPUQjyjhQV3kDoDUEBjBtxRaixhCdfcUarZjreryByDr4EJRd5E3FtYkPgm7qEJBXb7I2hAY0bcgZ4MwQnlzRSR7UxBXGEK/ZDKe0xTeEJpXWIOT5hzR3qAG7FdLLkj3QubLDK1s5E1h4rgAY2RVQKnVtiqyKq6ZQ4SZtyh7uCbUmmNKXbYXZI1+EZVaG7JqtZoQk2oCflNHSSccoe6M3OQcMYd6g66hlGQVcfAlhJLsgqKEwcJhW3MpK/9PpK2Ftx+l9c7n9yRHuCnT7ImTy6aGlkNzdkXOOAXd6An6FGNrBFNAV2pEfeQfnwcoAEP3HEqfEMTfnPHqYDaTFOSVQ7+A1lvk1Vnu0COTYVuUMTdRJm3ELlKyp2kFmWH9y3BX5dgFvNFbhf6g74HuiC0mSkh6jWCN9AW6ANweUPuB9QFfWHL91VOpIAn7stvIKAUpRLRrcxFYD+POvQi4HmWYXsXE5Ezikp2tUVp9cOXbFZqZK3EvNV+J1/KfclthW0+Vjdm259X8Cpt/rnzQfhIrc4oa1gmzqTtlm1u1KQA993ffP/xX88Zl7JWeu1EWd0JLutM1g5LgmA3e0w5zn/ZQUpno4EfZ4XYH/T81VNKKaWUUkoxCQar1B8Oh3Hh/Ounq8EvmDyFQZrN9utXH19u1vtZlgZh72ZTQRRPt6cGNZoLbzuNo77c1Gi4mB9bhLv6mi+GAjfs3ZnE23+swt3E/IyFbWH/X7jKbU68rLLJd/JK4Ku93ZNZ57hYSWp9oil2c2lpM5XyUg7nDuKVfgTsjgqwG2efzXj7kCBHb9GvsOfLGLr4Rr1KztSyuvjmsA7HCniL9U+EztdQA/yXXO+MO30dUVtl2+nuW6/g3T86uNLVbdx10EPU6eTwqC6b0GcdNKrdNzH3XJ/jFpyYAxpzcvoyRvgDr9rbONzeEFEn8BhfzmZVLo4VsOMooosTy2w5eVAnEt7Bi6ODatWo25H2Ox6+ioM/GJFmjg7o4ogdGvBhZy7On6GC7mqU1IxeIRtUd/VCCuCryDudqAebaLg4QAgD1StK6yiuQJ/ySWxHLzDtqazBzD0PEdDF8bI4iPobd4Y36AFl30LETcQu7eIdqQEx/1HlEnVBA/2nDnjEMybkDmeuaAMbqSPSW7TRqcxJxT3SFKMPDyntMZXeGZYoXSLXQmE7lMUa7mtvyD6gzPLMM/uCjfwBTcl+WNOH3rBg3yO2OxaBz9Y6YR/6+4J9n48/wtoN+4OxJVdobtlXa35/whP3pTdkf0BYPwZtlGGb6x3OKPaHDrv4rzEXCP9fxn3pDdkH7MljSjkZO5ReLS0cSfvc8X8vikc8Bk1+HYNc1ufZ0t0c4LuhSHLZe43Zj7GSOrYZ47Z9h36+TDxJkmXuy/sKUymllFJKKaWUUkoppZRS6pV/AQ4BWPUhXqoHAAAAAElFTkSuQmCC" alt="Avatar Tailwind CSS Component" />
              </div>
            </div>
            <div>
              <div className="font-bold">{{ data?.name || 'null' }}</div>
              <div className="text-sm opacity-50">{{ data?.sex || 'null' }}</div>
            </div>
          </div>
        </td>
        <td @click.prevent="$router.push(`/detail/${data?.id}`)">
          {{ data?.nik || 'null' }}
          <br/>
          <!-- <span className="badge badge-ghost badge-sm">Desktop Support Technician</span> -->
        </td>
        <td @click.prevent="$router.push(`/detail/${data?.id}`)">{{ data?.phone || 'null' }}</td>
        <td @click.prevent="$router.push(`/detail/${data?.id}`)">{{ data?.religion || 'null' }}</td>
        <td @click.prevent="$router.push(`/detail/${data?.id}`)">{{ data?.address || 'null' }}</td>

        <td>
          <!-- <button @click.prevent="$router.push(`/detail/${data?.id}`)" className="btn btn-ghost btn-xs">details</button> -->
          <button @click.prevent="$router.push(`/form/${data?.id}`)" className="btn btn-ghost btn-xs">edit</button>
          <button @click.prevent="handleDestroy(data.id)" className="btn btn-ghost btn-xs">delete</button>
        </td>
      </tr>
</template>

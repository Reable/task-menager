import { defineStore } from 'pinia'
import axios from "axios";

export const useStore = defineStore('store', {
    state: () => {
        return {
            allTasks: []
        }
    },
    actions: {
        async auth(){
            let token = "Hello world"
            localStorage.setItem('token', token)
        },
        async logout(){
              localStorage.removeItem('token')
        },
        async getAllTasks() {
            const {data} = await axios.get('https://jsonplaceholder.typicode.com/todos')
            this.allTasks = data
            return data
        },
        async addTask(data){
            this.allTasks.push(data)
        }
    },
})
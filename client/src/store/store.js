import { defineStore } from 'pinia'
import axios from "axios";

export const useStore = defineStore('store', {
    state: () => {
        return {
            allTasks: [],
        }
    },
    actions: {
        async register(user){
            return await axios.post("http://localhost:8000/api/auth/register", user)
                .then(res => res)
                .catch(err => err.response)
        },
        async login(user){
            return await axios.post("http://localhost:8000/api/auth/login", user)
                .then(res => res)
                .catch(err => err.response)
        },
        async logout(){
              localStorage.removeItem('token')
        },
        async getAllTasks() {
            const res = await axios.get("http://localhost:8000/api/task", {
                headers: {
                    "Authorization": `Bearer ${localStorage.getItem('token')}`
                }
            })
                .then(res => res)
                .catch(err => err.response)

            if(res.status === 200){
                this.allTasks = res.data
                return res
            }
            if(res.status === 401){
                localStorage.removeItem('token')
                this.allTasks = []
                return res
            }
        },
        async addTask(data){
            const res = await axios.post("http://localhost:8000/api/task", data,{
                headers: {
                    "Authorization": `Bearer ${localStorage.getItem('token')}`
                }
            })
            if(res.status === 401){
                localStorage.removeItem('token')
            }
            this.allTasks.unshift(res.data.task)
        },
        async updateTask(task, id){
            const res = await axios.post(`http://localhost:8000/api/task/${id}`, task,{
                headers: {
                    "Authorization": `Bearer ${localStorage.getItem('token')}`
                }
            })
                .then(res => res)
                .catch(err => console.error(err))
            if(res.status === 401){
                localStorage.removeItem('token')
            }

            let taskIndex = this.allTasks.findIndex(elem => elem.id === res.data.task.id)
            this.allTasks[taskIndex] = res.data.task

            return {... res.data.task, status: res.status}
        },

        async deleteTask(id){
            const res = await axios.delete(`http://localhost:8000/api/task/${id}`,{
                headers: {
                    "Authorization": `Bearer ${localStorage.getItem('token')}`
                }
            })
                .then(res => res)
                .catch(err => err)

            let taskIndex = this.allTasks.findIndex(elem => elem.id === res.data.task.id)
            this.allTasks.splice(taskIndex, 1);
            return res
        }
    },
})
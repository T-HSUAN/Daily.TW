import axios from 'axios'
export const publicPath = process.env.NODE_ENV === "production"
    ? "/chd102/g5/"
    : "/"

const axiosInstance = axios.create({
    baseURL: publicPath
})

const GET = (url, params) => {
    return new Promise((resolve, reject) => {
        axiosInstance.get(url, params).then(res => {
            resolve(res.data)
        }).catch((error) => {
            reject(error)
        })
    })
}

const POST = (url, data) => {
    return new Promise((resolve, reject) => {
        axiosInstance.post(url, data).then(res => {
            resolve(res.data)
        }).catch(error => {
            reject(error)
        })
    })
}

export { GET, POST }
import http from "../http-common";

class TaskDataService {
  getAll() {
    return http.get("/http://127.0.0.1:8000/api/tasks");
  }

  get(id) {
    return http.get(`/http://127.0.0.1:8000/api/tasks/${id}`);
  }

  create(data) {
    return http.post("/http://127.0.0.1:8000/api/tasks", data);
  }

  update(id, data) {
    return http.put(`/http://127.0.0.1:8000/api/tasks/${id}`, data);
  }

  delete(id) {
    return http.delete(`/http://127.0.0.1:8000/api/tasks/${id}`);
  }

  deleteAll() {
    return http.delete(`/http://127.0.0.1:8000/api/tasks`);
  }


}

export default new TaskDataService();

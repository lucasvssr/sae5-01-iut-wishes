export const BASE_URL = "http://127.0.0.1:8000/api";

export async function fetchAllUsers(): Promise<any> {
  const response = await fetch(`${BASE_URL}/users`);
  return await response.json();
}

export async function fetchAllSubjects(): Promise<any> {
  const response = await fetch(`${BASE_URL}/subjects`);
  return await response.json();
}

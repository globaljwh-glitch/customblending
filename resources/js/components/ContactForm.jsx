import { useState } from "react";
import axios from "axios";

export default function ContactForm() {
  const [form, setForm] = useState({
    first_name: "",
    last_name: "",
    business_email: "",
    company_name: "",
    phone: "",
    what_best_describe_you: "",
    industry: "",
    message: "",
  });

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      await axios.post("/api/contact", form);
      alert("Form submitted successfully");
      setForm({
        first_name: "",
        last_name: "",
        business_email: "",
        company_name: "",
        phone: "",
        what_best_describe_you: "",
        industry: "",
        message: "",
      });
    } catch (error) {
      console.error(error);
      alert("Submission failed");
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <input name="first_name" placeholder="First Name" value={form.first_name} onChange={handleChange} />
      <input name="last_name" placeholder="Last Name" value={form.last_name} onChange={handleChange} />
      <input name="business_email" placeholder="Business Email" value={form.business_email} onChange={handleChange} />
      <input name="company_name" placeholder="Company Name" value={form.company_name} onChange={handleChange} />
      <input name="phone" placeholder="Phone" value={form.phone} onChange={handleChange} />
      <input name="what_best_describe_you" placeholder="Describe You" value={form.what_best_describe_you} onChange={handleChange} />
      <input name="industry" placeholder="Industry" value={form.industry} onChange={handleChange} />
      <textarea name="message" placeholder="Message" value={form.message} onChange={handleChange} />
      <button type="submit">Submit</button>
    </form>
  );
}

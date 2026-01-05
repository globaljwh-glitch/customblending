const services = [
  {
    title: "Flash Drying",
    desc: "Rapid moisture removal for heat-sensitive powders and slurries while preserving product quality.",
  },
  {
    title: "Fluid Bed Drying",
    desc: "Uniform and controlled drying for granular materials using advanced fluidization techniques.",
  },
  {
    title: "Custom Processing",
    desc: "Tailored processing solutions designed to meet your product and production requirements.",
  },
];

export default function Services() {
  return (
    <section className="services">
      <h3>Our Services</h3>

      <div className="service-grid">
        {services.map((item, index) => (
          <div className="card" key={index}>
            <h4>{item.title}</h4>
            <p>{item.desc}</p>
          </div>
        ))}
      </div>
    </section>
  );
}

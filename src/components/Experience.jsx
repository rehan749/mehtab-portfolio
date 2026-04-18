const experiences = [
  {
    company: "Techno8ive Private Limited",
    role: "Web Developer",
    duration: "06/2025 - Present",
    desc: "A company focused on web development and digital solutions",
    points: [
      "Design and develop responsive static and dynamic websites using modern web technologies.",
      "Manage Html,css,js and WordPress websites, hosting, domains, DNS, backups, and SSL certificates.",
      "Implement SEO strategies and optimize websites for speed, performance, and security.",
    ],
  },
  {
    company: "Deeom Digital Solutions",
    role: "Web Developer",
    duration: "03/2023 - 05/2025",
    desc: "A digital solutions company providing web development services",
    points: [
      "Built responsive websites using HTML, CSS, JavaScript, PHP, and MySQL.",
      "Maintained CMS platforms and managed databases for web applications.",
      "Debugged, optimized, and maintained websites for smooth functionality.",
    ],
  },
  {
    company: "WebGanges Technologies Pvt. Ltd",
    role: "Web Designer",
    duration: "01/2022 - 12/2022",
    desc: "A technology firm specializing in web design and development",
    points: [
      "Improved website UI/UX and established design guidelines and standards.",
      "Designed layouts, color schemes, and typography for client websites.",
      "Built responsive websites using HTML, CSS, JavaScript.",
    ],
  },
];

const Experience = () => {
  return (
    <section className="mt-15 mx-auto w-full max-w-[1600px] rounded-3xl border-[5px] border-violet-500/40 shadow-[0_0_30px_rgba(168,85,247,0.4)] bg-gradient-to-br from-[#0a0a0a] via-[#111111] to-[#1a1a1a] p-6">
      <h2 className="text-3xl font-bold mb-10 text-gray-800 dark:text-white">
        Work Experience
      </h2>

      <div className="space-y-10">
        {experiences.map((exp, index) => (
          <div key={index} className="border-b pb-6">
            
            {/* Top Row */}
            <div className="flex flex-col md:flex-row md:justify-between md:items-center">
              <h3 className="text-xl font-semibold text-gray-800 dark:text-white">
                {exp.company} - {exp.role}
              </h3>
              <span className="text-gray-600 dark:text-gray-400 text-sm">
                {exp.duration}
              </span>
            </div>

            {/* Description */}
            <p className="text-gray-600 dark:text-gray-400 mt-2">
              {exp.desc}
            </p>

            {/* Points */}
            <ul className="list-disc ml-5 mt-3 space-y-1 text-gray-700 dark:text-gray-300">
              {exp.points.map((point, i) => (
                <li key={i}>{point}</li>
              ))}
            </ul>

          </div>
        ))}
      </div>
    </section>
  );
};

export default Experience;
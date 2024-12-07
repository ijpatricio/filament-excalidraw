import esbuild from 'esbuild'
import path from 'path'

const isDev = process.argv.includes('--dev')

async function compile(options) {
    const context = await esbuild.context(options)

    if (isDev) {
        await context.watch()
    } else {
        await context.rebuild()
        await context.dispose()
    }
}

const defaultOptions = {
    define: {
        'process.env.NODE_ENV': isDev ? `'development'` : `'production'`,
        'process.env.IS_PREACT': `'false'`,
    },
    bundle: true,
    mainFields: ['module', 'main'],
    platform: 'neutral',
    sourcemap: isDev ? 'inline' : false,
    sourcesContent: isDev,
    treeShaking: true,
    target: ['es2020'],
    minify: !isDev,
    plugins: [
        {
            name: 'watchPlugin',
            setup: function(build) {
                build.onStart(() => {
                    console.log(`Build started at ${new Date(Date.now()).toLocaleTimeString()}: ${build.initialOptions.outfile}`)
                })

                build.onEnd((result) => {
                    if (result.errors.length > 0) {
                        console.log(`Build failed at ${new Date(Date.now()).toLocaleTimeString()}: ${build.initialOptions.outfile}`, result.errors)
                    } else {
                        console.log(`Build finished at ${new Date(Date.now()).toLocaleTimeString()}: ${build.initialOptions.outfile}`)
                    }
                })
            },
        },
        {
            name: 'alias-plugin',
            setup(build) {
                build.onResolve({ filter: /^@mingle\// }, args => {
                    const relativePath = args.path.replace('@mingle/', '')
                    const absolutePath = path.resolve(process.cwd(), 'vendor/ijpatricio/mingle/resources/js', relativePath)
                    return { path: absolutePath }
                })
            }
        },
    ],
}

compile({
    ...defaultOptions,
    entryPoints: ['./resources/js/index.jsx'],
    outfile: './resources/dist/filament-excalidraw.js',
})
